var fx_state = JSON.parse(document.getElementById("fx-state").innerHTML);

var fx_event_source = new EventSource("?_fx_live_reload");

fx_event_source.onmessage = function (e) {
  if (e.data === "reload") {
    var body = new FormData();
    body.append(
      "meta",
      JSON.stringify({
        event: {
          type: null,
          target: null,
        },
        state: fx_state,
      })
    );
    fetch(location.href, {
      method: "post",
      body: body,
    })
      .then(fx_json)
      .then(fx_render);
  }
};

addEventListener("beforeunload", function (e) {
  fx_event_source.close();
});

addEventListener("submit", function (e) {
  e.preventDefault();
});

addEventListener("click", function (e) {
  var target = e.target.closest && e.target.closest("[data-target]");
  if (target && e.target.nodeName === "BUTTON") {
    var body = new FormData();
    body.append(
      "meta",
      JSON.stringify({
        event: {
          type: "click",
          target: target.dataset.target,
          id: e.target.dataset.id,
          tag: e.target.dataset.tag,
        },
        state: fx_state,
      })
    );
    fetch(location.href, {
      method: "post",
      body: body,
    })
      .then(fx_json)
      .then(fx_render);
  }
});

addEventListener("input", function (e) {
  var target = e.target.closest && e.target.closest("[data-target]");
  if (target) {
    var body = new FormData();
    body.append(
      "meta",
      JSON.stringify({
        event: {
          type: "change",
          target: target.dataset.target,
          id: e.target.dataset.id,
          tag: e.target.dataset.tag,
          value: e.target.value,
          checked: e.target.checked,
          selected:
            e.target.selectedOptions &&
            Array.from(e.target.selectedOptions).map(function (option) {
              return option.value;
            }),
        },
        state: fx_state,
      })
    );
    fetch(location.href, {
      method: "post",
      body: body,
    })
      .then(fx_json)
      .then(fx_render);
  }
});

addEventListener("popstate", function (e) {
  if (e.state) {
    fx_render(e.state);
  }
});

function fx_json(response) {
  return response.json();
}

function fx_render(json) {
  var current = {
    state: fx_state,
    body: document.body.innerHTML,
    commands: [],
  };
  fx_state = json.state;
  var next = document.body.cloneNode();
  next.innerHTML = json.body;
  fx_patch(document.body, next);
  json.commands.forEach(function (command) {
    switch (command.type) {
      case "push_state":
        history.replaceState(current, 0);
        history.pushState(
          {
            state: json.state,
            body: json.body,
            commands: [],
          },
          0
        );
        break;
      case "pop_state":
        history.back();
        break;
      case "focus":
        var target = document.querySelector(
          '[data-target="' + command.target + '"]'
        );
        if (target) {
          if (command.id) {
            var id = target.querySelector('[data-id="' + command.id + '"]');
            if (id) {
              if (command.tag) {
                var tag = id.querySelector('[data-tag="' + command.tag + '"]');
                if (tag) {
                  tag.focus();
                }
              } else {
                id.focus();
              }
            }
          } else {
            target.focus();
          }
        }
        break;
    }
  });
}

function fx_patch(curr, next) {
  if (curr.isEqualNode(next)) {
    return;
  }
  if (curr.nodeName !== next.nodeName) {
    curr.parentNode.replaceChild(next, curr);
    return;
  }
  if (curr.nodeType === 3) {
    if (curr.data !== next.data) {
      curr.data = next.data;
    }
    return;
  }
  if (curr.nodeType === 1) {
    if (curr.nodeName === "IFRAME" && curr.src !== next.src) {
      curr.parentNode.replaceChild(next, curr);
      return;
    }
    for (var i = 0; i < next.attributes.length; i++) {
      var attr = next.attributes[i];
      if (curr.getAttribute(attr.name) !== attr.value) {
        curr.setAttribute(attr.name, attr.value);
      }
    }
    for (var i = curr.attributes.length - 1; i > -1; i--) {
      var name = curr.attributes[i].name;
      if (!next.hasAttribute(name)) {
        curr.removeAttribute(name);
      }
    }
    if (curr.checked !== next.checked) {
      curr.checked = next.checked;
    }
    if (curr.value !== next.value) {
      curr.value = next.value;
    }
    var currLen = curr.childNodes.length;
    var nextLen = next.childNodes.length;
    if (currLen < nextLen) {
      for (var i = currLen; i < nextLen; i++) {
        curr.appendChild(next.childNodes[currLen]);
      }
    }
    if (nextLen < currLen) {
      for (var i = nextLen; i < currLen; i++) {
        curr.removeChild(curr.childNodes[nextLen]);
      }
    }
    for (var i = Math.min(currLen, nextLen) - 1; i > -1; i--) {
      fx_patch(curr.childNodes[i], next.childNodes[i]);
    }
    return;
  }
  throw new Error();
}
