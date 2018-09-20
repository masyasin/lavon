! function(t) {
    function e(o) {
        if (a[o]) return a[o].exports;
        var r = a[o] = {
            exports: {},
            id: o,
            loaded: !1
        };
        return t[o].call(r.exports, r, r.exports, e), r.loaded = !0, r.exports
    }
    var a = {};
    return e.m = t, e.c = a, e.p = "", e(0)
}([function(t, e) {
    "use strict";

    function a(t, e) {
        var e = null == e ? "content" : e,
            a = document.querySelector("meta[name='" + t + "']");
        return a ? a.getAttribute(e) || "" : ""
    }
    var o = {
        config: {
            url: String(window.location),
            title: document.title,
            media: a("twitter:image:src"),
            description: a("description"),
            shortUrl: String(window.location)
        }
    };
    "#_=_" == window.location.hash && window.close(), window.ShareData = window.ShareData || o, window.Share = {
        total: 0,
        shareText: " Shares",
        create: function(t) {
            var e = t.getAttribute("data-type");
            return e ? (ShareData.config.description = t.getAttribute("data-desc") || ShareData.config.description, ShareData.config.media = t.getAttribute("data-img") || ShareData.config.media, ShareData.config.url = t.getAttribute("data-url") || ShareData.config.url, ShareData.config.shortUrl = t.getAttribute("data-shorturl") || ShareData.config.shortUrl, ShareData.config.title = t.getAttribute("data-title") || ShareData.config.title, "//" == ShareData.config.media.substring(0, 2) && (ShareData.config.media = "http:" + window.ShareData.config.media), ShareData.config.url = ShareData.config.url.replace(base_url(), base_url()), $.get(base_url()+ "shares", {
                url: ShareData.config.url,
                shareTo: e
            }, function(t) {}), "pinterest" == e && Share.windowOpen(Share.pinterestUrl()), "twitter" == e && Share.windowOpen(Share.twitterUrl()), "facebook" == e && Share.windowOpen(Share.facebookUrl()), "gplus" == e && Share.windowOpen(Share.gplusUrl()), "email" == e && t.setAttribute("href", Share.ngimail()), !1) : (alert("Invalid social media"), !1)
        },
        windowOpen: function(t, e, a, o) {
            var a = a || 400,
                o = o || 550,
                r = window.outerWidth / 2 + (window.screenX || window.screenLeft || 0) - o / 2,
                i = window.outerHeight / 2 + (window.screenY || window.screenTop || 0) - a / 2,
                n = {
                    height: a,
                    width: o,
                    left: r,
                    top: i,
                    location: "no",
                    toolbar: "no",
                    status: "no",
                    directories: "no",
                    menubar: "no",
                    scrollbars: "yes",
                    resizable: "no",
                    centerscreen: "yes",
                    chrome: "yes"
                };
            return window.open(t, e, Object.keys(n).map(function(t) {
                return t + "=" + n[t]
            }).join(", "))
        },
        ngimail: function() {
            return "mailto:" + Share.objectToGetParams({
                subject: ShareData.config.title,
                body: ShareData.config.url
            })
        },
        objectToGetParams: function(t) {
            return "?" + Object.keys(t).filter(function(e) {
                return !!t[e]
            }).map(function(e) {
                return e + "=" + encodeURIComponent(t[e])
            }).join("&")
        },
        facebookUrl: function() {
            return "https://facebook.com/dialog/feed" + Share.objectToGetParams({
                app_id: sosmed.facebook_appid,
                display: "popup",
                link: ShareData.config.url,
                name: ShareData.config.title,
                caption: hostname,
                // picture: ShareData.config.media.replace("old.cnd", "new.cdn").replace("share/tw", "share/fb"),
                picture: ShareData.config.media.replace("share/tw", "share/fb"),
                description: ShareData.config.description,
                redirect_uri: ShareData.config.url
            })
        },
        twitterUrl: function() {
            var t = ShareData.config.description;
            return t.length > 120 && (t = ShareData.config.title), "https://twitter.com/intent/tweet" + Share.objectToGetParams({
                text: t,
                via: sosmed.twitter,
                url: ShareData.config.shortUrl
            })
        },
        pinterestUrl: function() {
            return "https://pinterest.com/pin/create/button/" + Share.objectToGetParams({
                url: ShareData.config.url,
                media: ShareData.config.media.replace("otf/860x", "otf/500x"),
                description: ShareData.config.description
            })
        },
        gplusUrl: function() {
            return "https://plus.google.com/share" + Share.objectToGetParams({
                url: ShareData.config.url
            })
        },
        shareCount: function() {
            var t = window.location.protocol,
                e = window.location.host,
                a = "url=" + ShareData.config.url,
                o = base_url() + "shares/count?" + a;
            $.ajax({
                url: o,
                success: function(t) {
                    // $(".facebookcount").html(t.total.facebook), $(".totalcount").html(Share.format(t.total.all) + Share.shareText), $(".pinterestcount").html(t.total.pinterest), $(".twittercount").html(t.total.twitterClick)
                }
            })
        },
        facebookCount: function() {
            var t = window.location.protocol,
                e = window.location.host,
                a = "url=" + ShareData.config.url,
                o = base_url() + "/microsites/socmed/facebook/shareCount?" + a;
            $.ajax({
                url: o,
                dataType: "jsonp",
                success: function(t) {}
            })
        },
        pinterestCount: function() {
            var t = "https://api.pinterest.com/v1/urls/count.json?url=" + ShareData.config.url;
            $.ajax({
                url: t,
                dataType: "jsonp",
                success: function(t) {}
            })
        },
        googleCount: function() {
            $.ajax({
                url: "https://clients6.google.com/rpc?key=AIzaSyCaQOjVG4UHfqgtQuhPRBu3KCl90rn-_GI",
                method: "POST",
                data: {
                    method: "pos.plusones.get",
                    id: "p",
                    params: {
                        nolog: !0,
                        id: ShareData.config.url,
                        source: "widget",
                        userId: "@viewer",
                        groupId: "@self"
                    },
                    jsonrpc: "2.0",
                    key: "p",
                    apiVersion: "v1"
                },
                dataType: "json",
                success: function(t) {
                    console.log(t)
                }
            })
        },
        gpl: function() {
            var t = {
                nolog: !0,
                id: ShareData.config.url,
                source: "widget",
                userId: "@viewer",
                groupId: "@self"
            };
            gapi.client.setApiKey("AIzaSyCaQOjVG4UHfqgtQuhPRBu3KCl90rn-_GI"), gapi.client.rpcRequest("pos.plusones.get", "v1", t).execute(function(t) {
                Share.total += t.result.metadata.globalCounts.count, $(".totalcount").html(Share.format(Share.total) + Share.shareText)
            })
        },
        count: function() {
            Share.hiring(), Share.shareCount()
        },
        format: function(t) {
            var e, a = [{
                value: 1e18,
                symbol: "E"
            }, {
                value: 1e15,
                symbol: "P"
            }, {
                value: 1e12,
                symbol: "T"
            }, {
                value: 1e9,
                symbol: "G"
            }, {
                value: 1e6,
                symbol: "M"
            }, {
                value: 1e3,
                symbol: "k"
            }];
            for (e = 0; e < a.length; e++)
                if (t >= a[e].value) return (t / a[e].value).toFixed(1).replace(/\.0+$|(\.[0-9]*[1-9])0+$/, "$1") + a[e].symbol;
            return t.toString()
        },
        pageLikes: function() {
            var t = window.location.protocol,
                e = window.location.host,
                a = base_url() + "/microsites/socmed/facebook/shareCount?isPage=1";
            $.ajax({
                url: a,
                dataType: "jsonp",
                success: function(t) {
                    var e = Share.format(t.total);
                    $(".fblikestotal").html(e + " likes")
                }
            })
        },
        followers: function() {
            var t = window.location.protocol,
                e = window.location.host,
                a = base_url() + "/microsites/socmed/twitter/followers";
            return $(".followerscount").length < 1 ? !1 : void $.ajax({
                url: a,
                dataType: "json",
                success: function(t) {
                    $(".followerscount").html(t.data.followers + " followers")
                }
            })
        },
        hiring: function() {
            if (window.console && window.console.log) {
                var t, e;
                t = "%c"+"sintechabadi.com", e = "color: #fff; font-size: 36px; font-weight: 900; background-color: #0098da; -webkit-background-clip: text; -moz-background-clip: text; background-clip: text; color: transparent; text-shadow: rgba(255,255,255,0.5) 0px 3px 3px;", window.console.log(t, e);
                var t, e;
                t = "%cEver thought about joining us? \nsend your cv to info@sintechabadi.com", e = "color: #222; font-size: 28px;", window.console.log(t, e)
            }
        }
    }, Share.count();
    // for (var r = $(".content-text-editor img"), i = 0; i < r.length; i++) {
    //     r[i].setAttribute("class", "img-responsive"), r[i].removeAttribute("width");
    //     var n = r[i].getAttribute("src");
    //     var nWatermark = n.split('/');
    //     n = n.replace(nWatermark[4] + '/' + nWatermark[5], 'share/fb');
    //     "//" == n.substring(0, 2) && (n = "https:" + n);
    //     var c = $("<span/>").html("share infografik"),
    //         l = $("<i/>").addClass("fa fa-facebook"),
    //         s = $("<i/>").addClass("fa fa-twitter"),
    //         u = $("<i/>").addClass("fa fa-envelope"),
    //         d = $("<a/>").attr({
    //             style: "margin-left:5px",
    //             href: "javascript:void(0);",
    //             "data-img": n,
    //             "data-type": "facebook",
    //             onclick: "Share.create(this);"
    //         }).append(l),
    //         h = $("<a/>").attr({
    //             style: "margin-left:5px",
    //             href: "javascript:void(0);",
    //             "data-img": n,
    //             "data-type": "twitter",
    //             onclick: "Share.create(this);"
    //         }).append(s),
    //         p = $("<a/>").attr({
    //             style: "margin-left:5px",
    //             href: "javascript:void(0);",
    //             "data-img": n,
    //             "data-type": "email",
    //             onclick: "Share.create(this);"
    //         }).append(u);
    //     $("<div/>").addClass("share-this-horizontal").append(c).append(d).append(h).append(p).insertAfter(r[i])
    // }
}]);