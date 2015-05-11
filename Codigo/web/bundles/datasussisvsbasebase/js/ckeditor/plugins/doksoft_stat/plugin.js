CKEDITOR.plugins.add("doksoft_stat", {
    lang: "en,ru,fr,pt",
    init: function(g) {

        var defaultConfig={
            maxCharCount: -1,
            showSourceCount: true,
            showCharCount: true,
            showWordCount: true
        };

        // Get Config & Lang
        var config = CKEDITOR.tools.extend(defaultConfig, g.config.doksoft_stat || {}, true);


        var d = function(n) {
            return n.replace(/^[\s]+([^\s])/g, "$1").replace(/([^\s])[\s]+$/g, "$1");
        };
        var h = function(n) {
            /*n = n.replace(/(\r\n|\n|\r)/gm, " ").replace(/&nbsp;/g, " ");
             return d(b(n)).split(/\s+/).length;*/
            n=b(n);

            return n.length>0? n.split(/\s+/).length:0;
        };
        var j = function() {
            var q = g.textarea.$;
            if (document.selection) {
                var p = document.selection.createRange().getBookmark();
                var o = q.createTextRange();
                o.moveToBookmark(p);
                var n = q.createTextRange();
                n.collapse(true);
                n.setEndPoint("EndToStart", o);
                q.selectionStart = n.text.length;
                q.selectionEnd = n.text.length + o.text.length;
                q.selectedText = o.text;
            } else {
                if (q.selectionStart) {
                    q.selectedText = q.value.substring(q.selectionStart, q.selectionEnd);
                }
            }
            return q.selectedText;
        };
        var l = function() {
            var o = 0,
                n = 0,
                p = "";
            if (g.mode != "source") {
                return "";
            }
            if (typeof(g.textarea.$.selectionStart) != "undefined") {
                o = g.textarea.$.selectionStart;
                n = g.textarea.$.selectionEnd;
            } else {
                if (window.getSelection) {
                    p = window.getSelection();
                } else {
                    if (document.getSelection) {
                        p = document.getSelection();
                    } else {
                        if (document.selection) {
                            p = document.selection.createRange().text;
                        }
                    }
                } if (p) {
                    o = g.textarea.$.indexOf(p);
                    if (o != 0) {
                        n = g.textarea.$.indexOf(p) + p.length;
                    }
                }
            }
            return g.textarea.$.value.substring(o, n);
        };
        var b = function(q) {
            var element = new CKEDITOR.dom.element( 'div' );
            element.setHtml(q);
            var text= element.getText();
            element.remove();
            return arguments[1]==false?text:CKEDITOR.tools.trim(text);
        };
        var k = 0;
        var c = function(o) {

            if (!o) return;

            if (checkKey(o)) {
                if (o.data.keyCode == 8)
                    atualizarContadores();
                return;
            }
            ;
            // console.log(o);

            var enter = false;
            o && o.data && o.data.keyCode && (enter = o.data.keyCode == 13 || o.data.keyCode == 2228237);

            var n = CKEDITOR.tools.trim(b(g.getData() + ""));


            textSize = n.length
            if (o.name != "paste" && o.name != "afterCommandExec" && o.data.domEvent.$.type == "keydown")
                textSize++;


            if (enter) {
                textSize = o.data.keyCode == 13 ? n.length + 2 : textSize;
            }

            //console.log("textSize: "+textSize);
            //console.log(n)

            if (config.maxCharCount > -1 && !checkKey(o) && textSize > config.maxCharCount) {
                o.cancel();
            }
            atualizarContadores();
        };

        var atualizarContadores = function (o) {
            clearTimeout(k);
            k = setTimeout(function () {
                var n = g.getData() + "";
                var trim = b(n).match(/\s$/);
                trim = trim != null ? true : false;
                console.log("trim: " + trim)
                config.showWordCount && document.getElementById("cke_doksoft_stat_word_number_" + g.name) && (document.getElementById("cke_doksoft_stat_word_number_" + g.name).innerHTML = g.lang.doksoft_stat.words + ":" + h(n));
                config.showCharCount && document.getElementById("cke_doksoft_stat_" + g.name) && (document.getElementById("cke_doksoft_stat_" + g.name).innerHTML = g.lang.doksoft_stat.strlen + ":" + (trim ? (b(n).trim().length + 1) : b(n).length) + "  Limit: " + config.maxCharCount);
                config.showSourceCount && document.getElementById("cke_doksoft_stat_source_" + g.name) && (document.getElementById("cke_doksoft_stat_source_" + g.name).innerHTML = g.lang.doksoft_stat.source + ":" + n.length);
            }, 100);
        }

        g.on("instanceReady", function(q) {
            var n = ["doksoft_stat", "doksoft_stat_select", "doksoft_stat_source", "doksoft_stat_without_space", "doksoft_stat_word_number"];
            var o = "float:left; line-height:16px; margin-left:10px;";
            for (var p in n) {
                var s = document.createElement("div");
                s.setAttribute("id", "cke_" + n[p] + "_" + g.name);
                s.setAttribute("style", o);
                CKEDITOR.document.getById(g.ui.spaceId("bottom")).append(new CKEDITOR.dom.node(s));
            }

            if(!config.showWordCount)document.getElementById("cke_doksoft_stat_word_number_" + g.name).display="none";
            if(!config.showSourceCount)document.getElementById("cke_doksoft_stat_source_" + g.name).display="none";
            if(!config.showCharCount)document.getElementById("cke_doksoft_stat_" + g.name).display="none";


            window.onmousemove = function(r) {
                if (a) {
                    e();
                }
            };
            window.onmouseup = function(r) {
                a = false;
            };
            c();
        });
        var f = 0;

        function m() {
            var o = "";
            if (g.mode == "wysiwyg") {
                var n = g.getSelection();
                o = (n && n.getType() == CKEDITOR.SELECTION_TEXT && n.getSelectedText() !== null) ? b(n.getSelectedText(), "nospace") : "";
            } else {
                if (!window["codemirror_" + g.id]) {
                    o = j();
                } else {
                    o = window["codemirror_" + g.id].getSelection();
                }
            }
            document.getElementById("cke_doksoft_stat_select_" + g.name) && (document.getElementById("cke_doksoft_stat_select_" + g.name).innerHTML = g.lang.doksoft_stat.sel + ":" + o.replace(/[\s\n\r]/g, "").length);
        }
        var e = function() {
            clearTimeout(f);
            f = setTimeout(m, 100);
        };
        var i = function(o) {
            if (o.data.$.shiftKey) {
                var n = o.data.$.keyCode;
                if (n >= 33 && n <= 40) {
                    e();
                }
            }
        };
        var checkKey = function(o){
            var n = '';
            o && o.data && o.data.keyCode && (n = o.data.keyCode);
            if(n== 8 || keyFree(n))
                return true;
            return false;

        };
        var keyFree=function(keyCode){
            //console.log(keyCode);
            var keys = [8, 123, 1114177, 1114200, 1114179, 1114202, 1114129, 46, 35, 37, 38, 39, 40, 2228240];
            for(i=0;i<keys.length;i++){
                if(keys[i]==keyCode)
                    return true;
            }
            return false;
        }
        var checkPaste = function(o){
            var n =b(o.data.dataValue,false);
            var t=b(g.getData())
            n=t+n;
            if(config.maxCharCount>-1 && n.length>config.maxCharCount)
                return false;
            c(o);
        };
        var a = false;
        g.on("mode", function(n) {
            if (g.mode != "source") {
                return;
            }
            g.textarea.on("keyup", i);
            g.textarea.on("mousedown", function(o) {
                a = true;
            });
        });
        g.on("contentDom", function(n) {
            this.getCommand("cut").on("state", e);
            g.document.on("keyup", i);
            g.document.on("mousedown", function(o) {
                a = true;
            });
            g.document.on("mouseup", function(o) {
                a = false;
            });
        });
        g.on("selectionChange", e);
        g.on("key", c);
        g.on("afterCommandExec", c);
        g.on("dialogHide", c);
        g.on("paste", checkPaste);

    }
})
