webpackJsonp([1],{

/***/ 102:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vuex__ = __webpack_require__(6);
var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

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
    name: 'Order',

    data: function data() {
        return {
            search: '',
            headers: [{ text: 'Code', value: 'code', align: 'left' }, { text: 'Name', value: 'name', align: 'left' }, { text: 'Cost', value: 'cost', align: 'left' }, { text: 'Price', value: 'price', align: 'left' }, { text: 'Category', value: 'category_id', align: 'left' }, { text: 'Image', value: 'image_uri', align: 'left' }, { text: 'Available', value: 'is_available', align: 'left' }, { text: 'Created At', value: 'created_at', align: 'left' }, { text: 'Updated At', value: 'updated_at', align: 'left' }],
            pagination: {
                page: 1
            }
        };
    },


    computed: _extends({}, Object(__WEBPACK_IMPORTED_MODULE_0_vuex__["mapState"])({
        items: function items(state) {
            return state.beverage.items;
        }
    })),

    mounted: function mounted() {
        this.fetchData();
    },


    methods: _extends({}, Object(__WEBPACK_IMPORTED_MODULE_0_vuex__["mapActions"])({
        fetchData: 'beverage/fetchData'
    }))
});

/***/ }),

/***/ 103:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "v-flex",
    [
      _c(
        "v-card",
        { attrs: { xs12: "" } },
        [
          _c("v-card-title", [
            _vm._v("\n            Order             \n        ")
          ]),
          _vm._v(" "),
          _c(
            "v-card-text",
            [
              _c(
                "v-layout",
                { attrs: { row: "", wrap: "" } },
                [
                  _c(
                    "v-btn",
                    {
                      attrs: { color: "primary" },
                      on: {
                        click: function($event) {
                          _vm.$router.push("order/new")
                        }
                      }
                    },
                    [_vm._v("New")]
                  ),
                  _vm._v(" "),
                  _c("v-spacer"),
                  _vm._v(" "),
                  _c("v-text-field", {
                    attrs: {
                      "append-icon": "search",
                      label: "Search",
                      "single-line": "",
                      "hide-details": ""
                    },
                    model: {
                      value: _vm.search,
                      callback: function($$v) {
                        _vm.search = $$v
                      },
                      expression: "search"
                    }
                  })
                ],
                1
              )
            ],
            1
          ),
          _vm._v(" "),
          _c("v-data-table", {
            attrs: {
              headers: _vm.headers,
              items: _vm.items,
              search: _vm.search,
              "hide-actions": ""
            },
            scopedSlots: _vm._u([
              {
                key: "items",
                fn: function(props) {
                  return _c("tr", {}, [
                    _c("td", [_vm._v(_vm._s(props.item.code))]),
                    _vm._v(" "),
                    _c("td", [_vm._v(_vm._s(props.item.name))]),
                    _vm._v(" "),
                    _c("td", [_vm._v(_vm._s(props.item.cost))]),
                    _vm._v(" "),
                    _c("td", [_vm._v(_vm._s(props.item.price))]),
                    _vm._v(" "),
                    _c("td", [_vm._v(_vm._s(props.item.category_id))]),
                    _vm._v(" "),
                    _c("td", [_vm._v(_vm._s(props.item.image))]),
                    _vm._v(" "),
                    _c("td", [_vm._v(_vm._s(props.item.is_available))]),
                    _vm._v(" "),
                    _c("td", [_vm._v(_vm._s(props.item.created_at))]),
                    _vm._v(" "),
                    _c("td", [_vm._v(_vm._s(props.item.updated_at))]),
                    _vm._v(" "),
                    _c(
                      "td",
                      [
                        _c("v-btn", { attrs: { flat: "", color: "primary" } }, [
                          _vm._v("Edit")
                        ])
                      ],
                      1
                    )
                  ])
                }
              }
            ])
          })
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
    require("vue-hot-reload-api")      .rerender("data-v-66299e3d", module.exports)
  }
}

/***/ }),

/***/ 86:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(5)
/* script */
var __vue_script__ = __webpack_require__(102)
/* template */
var __vue_template__ = __webpack_require__(103)
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
Component.options.__file = "resources\\assets\\js\\pages\\order\\index.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {  return key !== "default" && key.substr(0, 2) !== "__"})) {  console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-66299e3d", Component.options)
  } else {
    hotAPI.reload("data-v-66299e3d", Component.options)
' + '  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ })

});