webpackJsonp([7],{

/***/ 101:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(3)
/* script */
var __vue_script__ = __webpack_require__(114)
/* template */
var __vue_template__ = __webpack_require__(115)
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
Component.options.__file = "resources\\assets\\js\\pages\\Category.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {  return key !== "default" && key.substr(0, 2) !== "__"})) {  console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-ea0a5d16", Component.options)
  } else {
    hotAPI.reload("data-v-ea0a5d16", Component.options)
' + '  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 114:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vuex__ = __webpack_require__(8);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_vuelidate_lib_validators__ = __webpack_require__(58);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_vuelidate_lib_validators___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_vuelidate_lib_validators__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__mixins_form__ = __webpack_require__(453);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__mixins_notify__ = __webpack_require__(454);
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
    name: 'Food',

    mixins: [__WEBPACK_IMPORTED_MODULE_2__mixins_form__["a" /* default */], __WEBPACK_IMPORTED_MODULE_3__mixins_notify__["a" /* default */]],

    data: function data() {
        return {
            search: '',
            headers: [{ text: 'Name', value: 'name', align: 'left' }, { text: 'Image', value: 'image_uri', align: 'left' }, { text: 'Type', value: 'type', align: 'left' }],
            pagination: {
                page: 1
            },
            opened_form_new: false,
            types: [{ text: 'Food', value: 1 }, { text: 'Beverage', value: 2 }, { text: 'Other', value: 3 }],
            model: {
                name: null,
                type: null
            },
            snackbar: {
                message: null,
                show: false,
                color: ''
            }
        };
    },


    validations: {
        model: {
            name: { required: __WEBPACK_IMPORTED_MODULE_1_vuelidate_lib_validators__["required"] },
            type: { required: __WEBPACK_IMPORTED_MODULE_1_vuelidate_lib_validators__["required"] }
        }
    },

    computed: _extends({}, Object(__WEBPACK_IMPORTED_MODULE_0_vuex__["mapState"])({
        items: function items(state) {
            return state.category.items;
        }
    }), {
        nameErrors: function nameErrors() {
            var errors = [];
            if (!this.$v.model.name.$dirty) return errors;
            !this.$v.model.name.required && errors.push('Name is required.');
            return errors;
        },
        typeErrors: function typeErrors() {
            var errors = [];
            if (!this.$v.model.type.$dirty) return errors;
            !this.$v.model.type.required && errors.push('Type is required.');
            return errors;
        }
    }),

    mounted: function mounted() {
        this.fetchData();
    },


    methods: _extends({}, Object(__WEBPACK_IMPORTED_MODULE_0_vuex__["mapActions"])({
        fetchData: 'category/fetchData',
        create: 'category/create',
        destroy: 'category/destroy'
    }), {
        addNew: function addNew() {
            var _this = this;

            // this.validate()

            this.create(this.model).then(function (response) {
                _this.opened_form_new = false;
                _this.resetModel();
            }).catch(function (error) {
                _this.notify('Fail to create a new category.', 'error');
            });
        }
    })
});

/***/ }),

/***/ 115:
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
            _vm._v("\n            Category             \n        ")
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
                          _vm.opened_form_new = true
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
                    _c("td", [_vm._v(_vm._s(props.item.name))]),
                    _vm._v(" "),
                    _c("td", [_vm._v(_vm._s(props.item.image))]),
                    _vm._v(" "),
                    _c("td", [_vm._v(_vm._s(props.item.type))]),
                    _vm._v(" "),
                    _c(
                      "td",
                      [
                        _c("v-btn", { attrs: { flat: "", color: "primary" } }, [
                          _vm._v("Edit")
                        ]),
                        _vm._v(" "),
                        _c(
                          "v-btn",
                          {
                            attrs: { flat: "", color: "error" },
                            on: {
                              click: function($event) {
                                _vm.destroy(props.item)
                              }
                            }
                          },
                          [_vm._v("Delete")]
                        )
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
      ),
      _vm._v(" "),
      _c(
        "v-dialog",
        {
          attrs: { persistent: "", "max-width": "290" },
          model: {
            value: _vm.opened_form_new,
            callback: function($$v) {
              _vm.opened_form_new = $$v
            },
            expression: "opened_form_new"
          }
        },
        [
          _c(
            "v-card",
            [
              _c("v-card-title", { staticClass: "headline" }, [
                _vm._v("New Category")
              ]),
              _vm._v(" "),
              _c(
                "v-card-text",
                [
                  _c(
                    "v-container",
                    { attrs: { "grid-list-md": "" } },
                    [
                      _c(
                        "v-layout",
                        { attrs: { wrap: "" } },
                        [
                          _c(
                            "v-flex",
                            { attrs: { xs12: "" } },
                            [
                              _c("v-text-field", {
                                attrs: {
                                  label: "Name",
                                  required: "",
                                  "error-messages": _vm.nameErrors
                                },
                                on: {
                                  input: function($event) {
                                    _vm.$v.model.name.$touch()
                                  },
                                  blur: function($event) {
                                    _vm.$v.model.name.$touch()
                                  }
                                },
                                model: {
                                  value: _vm.model.name,
                                  callback: function($$v) {
                                    _vm.$set(_vm.model, "name", $$v)
                                  },
                                  expression: "model.name"
                                }
                              })
                            ],
                            1
                          ),
                          _vm._v(" "),
                          _c(
                            "v-flex",
                            { attrs: { xs12: "" } },
                            [
                              _c("v-select", {
                                attrs: {
                                  label: "Type",
                                  required: "",
                                  items: _vm.types,
                                  "item-text": "text",
                                  "item-value": "value",
                                  "error-messages": _vm.typeErrors
                                },
                                on: {
                                  change: function($event) {
                                    _vm.$v.model.type.$touch()
                                  },
                                  blur: function($event) {
                                    _vm.$v.model.type.$touch()
                                  }
                                },
                                model: {
                                  value: _vm.model.type,
                                  callback: function($$v) {
                                    _vm.$set(_vm.model, "type", $$v)
                                  },
                                  expression: "model.type"
                                }
                              })
                            ],
                            1
                          )
                        ],
                        1
                      )
                    ],
                    1
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "v-card-actions",
                [
                  _c("v-spacer"),
                  _vm._v(" "),
                  _c(
                    "v-btn",
                    {
                      attrs: { color: "primary" },
                      on: {
                        click: function($event) {
                          _vm.addNew()
                        }
                      }
                    },
                    [_vm._v("Save")]
                  ),
                  _vm._v(" "),
                  _c(
                    "v-btn",
                    {
                      attrs: { color: "primary", flat: "" },
                      on: {
                        click: function($event) {
                          _vm.close()
                        }
                      }
                    },
                    [_vm._v("Close")]
                  )
                ],
                1
              )
            ],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "v-snackbar",
        {
          attrs: { timeout: 6000, top: "", color: _vm.snackbar.color },
          model: {
            value: _vm.snackbar.show,
            callback: function($$v) {
              _vm.$set(_vm.snackbar, "show", $$v)
            },
            expression: "snackbar.show"
          }
        },
        [
          _vm._v("\n        " + _vm._s(_vm.snackbar.message) + "\n        "),
          _c(
            "v-btn",
            {
              attrs: { flat: "", color: "pink" },
              nativeOn: {
                click: function($event) {
                  _vm.snackbar.show = false
                }
              }
            },
            [_vm._v("Close")]
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
    require("vue-hot-reload-api")      .rerender("data-v-ea0a5d16", module.exports)
  }
}

/***/ }),

/***/ 453:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony default export */ __webpack_exports__["a"] = ({
    methods: {
        close: function close() {
            this.resetModel();
            this.$v.model.$reset();
            this.opened_form_new = false;
        },
        validate: function validate() {
            this.$v.model.$touch();
            if (this.$v.model.$error) {
                throw 'Validation failed';
            }
        },
        resetModel: function resetModel() {
            for (var prop in this.model) {
                this.model[prop] = null;
            }
        }
    }
});

/***/ }),

/***/ 454:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony default export */ __webpack_exports__["a"] = ({
    methods: {
        notify: function notify(message) {
            var color = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';

            this.snackbar.message = message;
            this.snackbar.color = color;
            this.snackbar.show = true;
        }
    }
});

/***/ })

});