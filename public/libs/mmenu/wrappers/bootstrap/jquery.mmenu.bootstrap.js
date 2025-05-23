/*
 * Bootstrap wrapper for jQuery mmenu
 * Include this file after including the jquery.mmenu plugin for default Bootstrap tabs, pills and navbar support.
 */
!function (n) {
    var e = "mmenu", a = "bootstrap";
    n[e].configuration.classNames.selected = "active", n[e].configuration.classNames.divider = "divider", n[e].defaults.initMenu = function (a) {
        for (var r = (n[e]._c, ""), o = ["nav-tabs", "nav-pills", "navbar-nav"], t = 0; t < o.length; t++) if (a.children("." + o[t]).length) {
            r = o[t];
            break
        }
        r.length && (i.menu.call(this), i.dropdown.call(this), i[r.split("nav-").join("").split("-nav").join("")].call(this))
    };
    var i = {
        menu: function () {
            this.$menu.children().removeClass("nav").find(".sr-only").remove().end().find(".divider:empty").remove();
            for (var n = ["role", "aria-haspopup", "aria-expanded"], e = 0; e < n.length; e++) this.$menu.find("[" + n[e] + "]").removeAttr(n[e])
        }, dropdown: function () {
            var e = this.$menu.find(".dropdown");
            e.removeClass("dropdown"), e.children(".dropdown-toggle").find(".caret").remove().end().each(function () {
                n(this).replaceWith("<span>" + n(this).html() + "</span>")
            }), e.children(".dropdown-menu").removeClass("dropdown-menu")
        }, tabs: function () {
            this.$menu.children().removeClass("nav-tabs")
        }, pills: function () {
            this.$menu.children().removeClass("nav-pills")
        }, navbar: function () {
            var n = this;
            this.$menu.removeClass("collapse navbar-collapse").wrapInner("<div />").children().children().removeClass("navbar-left navbar-right navbar-nav navbar-text navbar-btn"), (this.$orig || this.$menu).closest(".navbar").find(".navbar-header").find(".navbar-toggle").off("click").on("click.mm-" + a + "-navbar", function (e) {
                n.open(), e.stopImmediatePropagation(), e.preventDefault()
            })
        }
    }
}(jQuery);
