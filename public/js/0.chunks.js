webpackJsonp([0],{

/***/ 105:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(3)
/* script */
var __vue_script__ = __webpack_require__(122)
/* template */
var __vue_template__ = __webpack_require__(123)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources\\assets\\js\\pages\\order\\new.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {  return key !== "default" && key.substr(0, 2) !== "__"})) {  console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-826c3e6a", Component.options)
  } else {
    hotAPI.reload("data-v-826c3e6a", Component.options)
' + '  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 122:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    name: 'OrderNew',

    data: function data() {
        return {
            tabs: ['Food', 'Beverage', 'Other'],
            active: null,
            text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
        };
    }
});

/***/ }),

/***/ 123:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "v-layout",
    [
      _c(
        "v-flex",
        { attrs: { sm12: "", md7: "" } },
        [
          _c(
            "v-tabs",
            {
              model: {
                value: _vm.active,
                callback: function($$v) {
                  _vm.active = $$v
                },
                expression: "active"
              }
            },
            [
              _c(
                "v-tabs-bar",
                [
                  _vm._l(_vm.tabs, function(tab) {
                    return _c(
                      "v-tabs-item",
                      { key: tab, attrs: { href: "#" + tab, ripple: "" } },
                      [
                        _vm._v(
                          "\n                            " +
                            _vm._s(tab) +
                            "\n                            "
                        )
                      ]
                    )
                  }),
                  _vm._v(" "),
                  _c("v-tabs-slider", { attrs: { color: "yellow" } })
                ],
                2
              ),
              _vm._v(" "),
              _c(
                "v-tabs-items",
                _vm._l(_vm.tabs, function(tab) {
                  return _c(
                    "v-tabs-content",
                    { key: tab, attrs: { id: tab } },
                    [
                      _c(
                        "v-container",
                        _vm._b(
                          { attrs: { fluid: "" } },
                          "v-container",
                          ((_obj = {}), (_obj["grid-list-md"] = true), _obj),
                          false
                        ),
                        [
                          _c(
                            "v-layout",
                            { attrs: { row: "", wrap: "" } },
                            _vm._l(20, function(n) {
                              return _c(
                                "v-flex",
                                { key: n, attrs: { xs4: "", sm2: "" } },
                                [
                                  _c(
                                    "a",
                                    {
                                      on: {
                                        click: function($event) {
                                          $event.preventDefault()
                                        }
                                      }
                                    },
                                    [
                                      _c(
                                        "v-card",
                                        [
                                          _c("v-card-media", {
                                            attrs: {
                                              src:
                                                "https://unsplash.it/300/300?image=" +
                                                (Math.floor(
                                                  Math.random() * 100
                                                ) +
                                                  1),
                                              height: "70px"
                                            }
                                          })
                                        ],
                                        1
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c("span", [_vm._v("Item")])
                                ]
                              )
                            })
                          )
                        ],
                        1
                      )
                    ],
                    1
                  )
                  var _obj
                })
              )
            ],
            1
          )
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-826c3e6a", module.exports)
  }
}

/***/ })

});