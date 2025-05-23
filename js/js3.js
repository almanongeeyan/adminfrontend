function _typeof(e) {
    return (_typeof =
        "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
            ? function (e) {
                  return typeof e;
              }
            : function (e) {
                  return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e;
              })(e);
}
((e) => {
    var t, o, a;
    "function" == typeof define && define.amd && (define(e), (t = !0)),
        "object" === ("undefined" == typeof exports ? "undefined" : _typeof(exports)) && ((module.exports = e()), (t = !0)),
        t ||
            ((o = window.Cookies),
            ((a = window.Cookies = e()).noConflict = function () {
                return (window.Cookies = o), a;
            }));
})(function () {
    function s() {
        for (var e = 0, t = {}; e < arguments.length; e++) {
            var o,
                a = arguments[e];
            for (o in a) t[o] = a[o];
        }
        return t;
    }
    function l(e) {
        return e.replace(/(%[0-9A-Z]{2})+/g, decodeURIComponent);
    }
    return (function e(d) {
        function i() {}
        function o(e, t, o) {
            if ("undefined" != typeof document) {
                "number" == typeof (o = s({ path: "/" }, i.defaults, o)).expires && (o.expires = new Date(+new Date() + 864e5 * o.expires)), (o.expires = o.expires ? o.expires.toUTCString() : "");
                try {
                    var a = JSON.stringify(t);
                    /^[\{\[]/.test(a) && (t = a);
                } catch (e) {}
                (t = d.write ? d.write(t, e) : encodeURIComponent(String(t)).replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g, decodeURIComponent)),
                    (e = encodeURIComponent(String(e))
                        .replace(/%(23|24|26|2B|5E|60|7C)/g, decodeURIComponent)
                        .replace(/[\(\)]/g, escape));
                var n,
                    r = "";
                for (n in o) o[n] && ((r += "; " + n), !0 !== o[n]) && (r += "=" + o[n].split(";")[0]);
                return (document.cookie = e + "=" + t + r);
            }
        }
        function t(e, t) {
            if ("undefined" != typeof document) {
                for (var o = {}, a = document.cookie ? document.cookie.split("; ") : [], n = 0; n < a.length; n++) {
                    var r = a[n].split("="),
                        i = r.slice(1).join("=");
                    t || '"' !== i.charAt(0) || (i = i.slice(1, -1));
                    try {
                        var s = l(r[0]),
                            i = (d.read || d)(i, s) || l(i);
                        if (t)
                            try {
                                i = JSON.parse(i);
                            } catch (e) {}
                        if (((o[s] = i), e === s)) break;
                    } catch (e) {}
                }
                return e ? o[e] : o;
            }
        }
        return (
            (i.set = o),
            (i.get = function (e) {
                return t(e, !1);
            }),
            (i.getJSON = function (e) {
                return t(e, !0);
            }),
            (i.remove = function (e, t) {
                o(e, "", s(t, { expires: -1 }));
            }),
            (i.defaults = {}),
            (i.withConverter = e),
            i
        );
    })(function () {});
}),
    ((i, s) => {
        var d = s("body"),
            l = s("head"),
            u = "#skin-theme",
            c = ".nk-sidebar",
            m = ".nk-header",
            f = ["demo9", "copywriter"],
            r = ["style", "aside", "header", "skin", "mode"],
            n = "light-mode",
            p = "dark-mode",
            h = ".nk-opt-item",
            y = ".nk-opt-list",
            v = { demo9: { aside: "is-light", header: "is-light", style: "ui-rounder" }, copywriter: { aside: "is-light", header: "is-light", style: "ui-rounder" } };
        (i.Demo = {
            save: function (e, t) {
                Cookies.set(i.Demo.apps(e), t);
            },
            remove: function (e) {
                Cookies.remove(i.Demo.apps(e));
            },
            current: function (e) {
                return Cookies.get(i.Demo.apps(e));
            },
            apps: function (e) {
                for (
                    var t,
                        o = window.location.pathname.split("/").map(function (e, t, o) {
                            return e.replace("-", "");
                        }),
                        a = 0,
                        n = f;
                    a < n.length;
                    a++
                ) {
                    var r = n[a];
                    0 <= o.indexOf(r) && (t = r);
                }
                return e ? e + "_" + t : t;
            },
            style: function (e, t) {
                var o = { mode: n + " " + p, style: "ui-bordered ui-default", aside: "is-light is-default is-theme is-dark", header: "is-light is-default is-theme is-dark" };
                return "all" === e ? o[t] || "" : "any" === e ? o.mode + " " + o.style + " " + o.aside + " " + o.header : "body" === e ? o.mode + " " + o.style : "is-default" === e || "ui-default" === e ? "" : e;
            },
            skins: function (e) {
                return !e || "default" === e ? "theme" : "theme-" + e;
            },
            defs: function (e) {
                var t = i.Demo.apps(),
                    t = v[t][e] || "";
                return i.Demo.current(e) ? i.Demo.current(e) : t;
            },
            apply: function () {
                i.Demo.apps();
                for (var e = 0, t = r; e < t.length; e++) {
                    var o,
                        a,
                        n = t[e];
                    ("aside" !== n && "header" !== n && "style" !== n) ||
                        ((o = i.Demo.defs(n)), s((a = "aside" === n ? c : "header" === n ? m : d)).removeClass(i.Demo.style("all", n)), "ui-default" !== o && "is-default" !== o && s(a).addClass(o)),
                        "mode" === n && i.Demo.update(n, i.Demo.current("mode")),
                        "skin" === n && i.Demo.update(n, i.Demo.current("skin"));
                }
                i.Demo.update("dir", i.Demo.current("dir"));
            },
            locked: function (e) {
                !0 === e
                    ? (s(h + "[data-key=aside]")
                          .add(h + "[data-key=header]")
                          .add(h + "[data-key=skin]")
                          .addClass("disabled"),
                      i.Demo.update("skin", "default", !0),
                      s(h + "[data-key=skin]").removeClass("active"),
                      s(h + "[data-key=skin][data-update=default]").addClass("active"))
                    : s(h + "[data-key=aside]")
                          .add(h + "[data-key=header]")
                          .add(h + "[data-key=skin]")
                          .removeClass("disabled");
            },
            update: function (e, t, o) {
                var a,
                    n = i.Demo.style(t, e),
                    r = i.Demo.style("all", e);
                i.Demo.apps();
                ("aside" !== e && "header" !== e) || (s((a = "header" == e ? m : c)).removeClass(r), s(a).addClass(n)),
                    "mode" === e && (d.removeClass(r).removeAttr("theme"), n === p ? (d.addClass(n).attr("theme", "dark"), i.Demo.locked(!0)) : (d.addClass(n).removeAttr("theme"), i.Demo.locked(!1))),
                    "style" === e && (d.removeClass(r), d.addClass(n)),
                    "skin" === e &&
                        ((a = i.Demo.skins(n)),
                        (r = s("#skin-default")
                            .attr("href")
                            .replace("theme", "skins/" + a)),
                        "theme" === a ? s(u).remove() : 0 < s(u).length ? s(u).attr("href", r) : l.append('<link id="skin-theme" rel="stylesheet" href="' + r + '">')),
                    !0 === o && i.Demo.save(e, t);
            },
            reset: function () {
                var t = i.Demo.apps();
                d.removeClass(i.Demo.style("body")).removeAttr("theme"), s(h).removeClass("active"), s(u).remove(), s(c).removeClass(i.Demo.style("all", "aside")), s(m).removeClass(i.Demo.style("all", "header"));
                for (var e = 0, o = r; e < o.length; e++) {
                    var a = o[e];
                    s("[data-key='" + a + "']").each(function () {
                        var e = s(this).data("update");
                        ("aside" !== a && "header" !== a && "style" !== a) || (e === v[t][a] && s(this).addClass("active")), ("mode" !== a && "skin" !== a) || (e !== n && "default" !== e) || s(this).addClass("active");
                    }),
                        i.Demo.remove(a);
                }
                s("[data-key='dir']").each(function () {
                    s(this).data("update") === i.Demo.current("dir") && s(this).addClass("active");
                }),
                    i.Demo.apply();
            },
            load: function () {
                i.Demo.apply(),
                    0 < s(h).length &&
                        s(h).each(function () {
                            var e = s(this).data("update"),
                                t = s(this).data("key");
                            ("aside" !== t && "header" !== t && "style" !== t) || (e === i.Demo.defs(t) && (s(this).parent(y).find(h).removeClass("active"), s(this).addClass("active"))),
                                ("mode" !== t && "skin" !== t && "dir" !== t) ||
                                    (e != i.Demo.current("skin") && e != i.Demo.current("mode") && e != i.Demo.current("dir")) ||
                                    (s(this).parent(y).find(h).removeClass("active"), s(this).addClass("active"));
                        });
            },
            trigger: function () {
                s(h).on("click", function (e) {
                    e.preventDefault();
                    var e = s(this),
                        t = e.parent(y),
                        o = e.data("update"),
                        a = e.data("key");
                    i.Demo.update(a, o, !0),
                        t.find(h).removeClass("active"),
                        e.addClass("active"),
                        "dir" == a &&
                            setTimeout(function () {
                                window.location.reload();
                            }, 100);
                }),
                    s(".nk-opt-reset > a").on("click", function (e) {
                        e.preventDefault(), i.Demo.reset();
                    });
            },
            init: function (e) {
                i.Demo.load(), i.Demo.trigger();
            },
        }),
            i.coms.docReady.push(i.Demo.init),
            (i.Promo = function () {
                var t = s(".pmo-st"),
                    o = s(".pmo-lv"),
                    e = s(".pmo-close");
                0 < e.length &&
                    e.on("click", function () {
                        var e = Cookies.get("cypt-offer");
                        return o.removeClass("active"), t.addClass("active"), null == e && Cookies.set("cypt-offer", "true", { expires: 1, path: "" }), !1;
                    }),
                    s(window).on("load", function () {
                        (null == Cookies.get("cypt-offer") ? o : t).addClass("active");
                    });
            }),
            i.coms.docReady.push(i.Promo);
    })(NioApp, jQuery);
