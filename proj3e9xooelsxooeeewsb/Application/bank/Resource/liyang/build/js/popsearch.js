/**
 * 定义弹窗并在其中增加查询模块
 * author kechangxu
 * 2018-9-6
 */
layui.define(['layer', 'laydate', 'laypage', 'form', 'tab', 'jquery'], function (exports) {
    "use strict";
    var layer = layui.layer;
    var laypage = layui.laypage;
    var form = layui.form;
    window.$ = layui.$;
    form.verify({
        length: function (value, item) {
            if (value.length < $(item).attr('lay-min')) {
                return '必须大于' + $(item).attr('lay-min') + '个字符'
            }

            if (value.length > $(item).attr('lay-max')) {
                return '必须小于' + $(item).attr('lay-max') + '个字符'
            }
        },
        gte: function (value, item) {
            if (value.length < $(item).attr('lay-gte')) {
                return '不小于' + $(item).attr('lay-gte') + '个字符'
            }
        },
        lte: function (value, item) {
            if (value.length > $(item).attr('lay-lte')) {
                return '不多于' + $(item).attr('lay-lte') + '个字符'
            }
        },
        eq: function (value, item) {
            if (value.length != $(item).attr('lay-eq')) {
                return '必须为' + $(item).attr('lay-eq') + '个字符'
            }
        },
        eq_or_not: function (value, item) {
            if (value.length != 0 && value.length != $(item).attr('lay-len')) {
                return '必须为' + $(item).attr('lay-len') + '个字符'
            } else {
                return false;
            }
        },
        zh_cn: function (value, item) {
            if (!/^([\u4E00-\u9FA5\uF900-\uFA2D])+$/.test(value)) {
                return '必须为中文'
            }
        },
        en: function (value, item) {
            if (!/^([a-zA-Z])+$/.test(value)) {
                return '只能为英文字母'
            }
        },
        en_number: function (value, item) {
            if (!/^([a-zA-Z_0-9])+$/.test(value)) {
                return '只能为字母数字和下划线'
            }
        },
        repeat: function (value, item) {
            /* if (value.length < 1) {
             return '必填项不能为空'
             }*/

            if (value != $($(item).attr('lay-repeat')).val()) {
                return $(item).attr('lay-repeat-text')
            }
        }
    });

    var popsearch = {
        layeditIndex: [],
        loadingIndex: 0,
        currentDataPageUrl: '',
        currentPage: 1,
        initPageUrl: '',
        layerWidth: "auto",
        preLayerWidth: "auto",
        dontReloadAjax: false,

        initPage: function (url, layerWidth, checkId) {
            $('.btn-search').bind('keydown', function (event) {
                if (event.keyCode == "13") {
                    event.preventDefault();
                }
            });
            $('.search_form').bind('keydown', function (event) {
                if (event.keyCode == "13") {
                    event.preventDefault();
                    $('.btn-search').click();
                }
            });

            popsearch.layerWidth = layerWidth;
            popsearch.preLayerWidth = layerWidth;

            $('.btn-search').click(function (e) {
                e.preventDefault();
                popsearch.loadAjaxPage(url + 'page=1&' + $('.search_form').serialize(), 1);
            });

            popsearch.bindReloadAndFullScreen();

            if (!url) {
                return;
            }

            this.initVueInst(".data_form_box");

            this.initPageUrl = url;

            this.loadAjaxPage(url, 1);
        },

        bindReloadAndFullScreen : function() {
            $('fieldset > legend > button.reload_page').on('click', function () {
                window.location.reload();
            });

            $('fieldset > legend > button.open_full_screen').on('click', function () {
                window.parent.openFullScreen(window.location.href);
            });
        },

        initVueInst: function (dom, vm) {
            var myvm = new Vue({
                el: dom,
                data: {
                    checkBtnValue: [],
                    checkedIds: [],
                    list: [],
                    totalNum: 0
                },
                created: function () {
                    $('.template').show();
                },
                computed: {
                    cCheckAll: {
                        get: function () {
                            return this.checkedIds.length == this.list.length;
                        },
                        set: function (value) {
                            var self = this;
                            self.checkedIds = [];
                            this.list.forEach(function (item) {
                                value ? self.checkedIds.push(item[checkId]) : self.checkedIds = [];
                                value ? self.checkBtnValue = 1 : self.checkBtnValue = [];
                            });
                            return value;
                        }
                    }
                },
                methods: {
                    view: function (title, url, width) {
                        popsearch.form.view(title, url, width);
                    },
                    add: function (title, form_url, save_url, width, func, showok, cancelCallback) {
                        popsearch.form.add(title, form_url, save_url, width, func, showok, cancelCallback);
                    },
                    edit: function (title, form_url, save_url, width, func, showok, cancelCallback) {
                        popsearch.form.edit(title, form_url, save_url, width, func, showok, cancelCallback);
                    },
                    del: function (url, id, msg, func) {
                        popsearch.form.del(url, id, msg, func);
                    },
                    disable: function (url, msg) {
                        popsearch.form.disable(url, msg);
                    },
                    newTab: function (url, id, title) {
                        window.parent.tab.tabAdd({
                            url: url,
                            title: title,
                            id: id
                        });
                    },
                    checkAll: function () {
                        this.cCheckAll = !this.cCheckAll;
                    },
                    allDel: function (url) {
                        if (this.checkedIds.length < 1) {
                            popsearch.showTip('请选择要删除的项!');
                        } else {
                            popsearch.form.del(url + checkId + '=' + this.checkedIds.join('|'), checkId, '确认要删除' + this.checkedIds.length + '条数据吗?');
                        }
                    },
                    allDisable: function (url) {
                        if (this.checkedIds.length < 1) {
                            popsearch.showTip('请选择要禁用的项!');
                        } else {
                            popsearch.form.disable(url + checkId + '=' + this.checkedIds.join('|'), '确认要禁用' + this.checkedIds.length + '条数据吗?');
                        }
                    }

                }
            });
            if (typeof(vm) == 'undefined') {
                window.list = myvm;
            } else {
                window[vm] = myvm;
            }
        },

        loadAjaxPage: function (url, currentPage) {
            if (typeof(loadIndexUrl) != 'undefined') {
                popsearch.reloadCurrentIframe();
                return true;
            }
            if (typeof(currentPage) != 'undefined') {
                popsearch.currentPage = currentPage;
            }
            popsearch.currentDataPageUrl = url;
            popsearch.loadUrl(url, 'json', function (res) {
	//alert(JSON.stringify(res));
                if (res.code != 0) {
                    popsearch.showTip(res.msg);
                    return;
                }

                if (res.data.list.length == 0 && popsearch.currentPage > 1) {
                    popsearch.loadAjaxPage(popsearch.initPageUrl + $('.search_form').serialize() + '&page=' + (popsearch.currentPage - 1), popsearch.currentPage - 1);
                    return;
                }
	//alert(JSON.stringify(res.data.list));
                window.list.$data.list = res.data.list;
                window.list.$data.totalNum = res.data.totalCount;
                window.list.$data.checkedIds = [];
                window.list.$data.checkBtnValue = [];
                laypage.render({
                    elem: $('.show_page'), //容器。值支持id名、原生dom对象，jquery对象,
                    count: res.data.totalCount,
                    limit: res.data.limit, //总页数
                    curr: popsearch.currentPage,
                    groups: 5,//连续显示分页数
                    jump: function (e, first) { //触发分页后的回调
                        if (!first) {
                            popsearch.loadAjaxPage(popsearch.initPageUrl + $('.search_form').serialize() + '&page=' + e.curr, e.curr);
                        }
                    }
                });
                setTimeout(function () {
                    window.scrollTo(0, 0);
                }, 10);
            });
        },

        /**
         * 加载页面并弹窗
         *
         * @param url 要加载的页面的url
         * @param title 弹窗的标题
         * @param func 弹窗里确定按钮执行的操作
         * @param showok 是否显示确定按钮 传入数组的时候为btn配置项
         * @param cancelCallback 取消按钮的回调
         */
        getDataShowPop: function (url, title, func, showok, cancelCallback) {
            this.loadUrl(url, 'html', function (data) {
                popsearch.showPopBox(data, 1, title, func, showok, cancelCallback);
            });
        },
		
        /**
         * 加载一个页面
         * @param url
         * @param type html /json
         * @param func
         */
        loadUrl: function (url, type, func) {
            popsearch.showLoading();
            $.ajax({
                url: url,
                dataType: type,
                success: function (data) {
                    popsearch.closeLoading();
                    if (type == 'json' && data.code == -1000000) {
                        window.location.href = data.msg;
                    }
                    func(data);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    popsearch.closeLoading();
                    func(XMLHttpRequest.responseText);
                }
            });
        },

        showTip: function (tip, func) {
            popsearch.showPopBox(tip, 2, '提示', func, 0);
        },

        /**
         * 显示提示信息
         * @param content 弹窗的内容
         * @param type 1/3为layer.open 2为layer.alert
         * @param title 弹窗的标题
         * @param func 确认按钮的回调
         * @param showok 是否显示确认按钮 传入数组的时候为btn配置项
         * @param cancelCallback 取消按钮的回调
         */
        showPopBox: function (content, type, title, func, showok, cancelCallback) {
            if (typeof(type) == 'undefined') {
                type = 1;
            }
            var okfunc = function () {

            };

            if (typeof(func) == 'undefined') {
                okfunc = function (index) {
                    popsearch.closePopBox(index);
                };
            } else if (!isNaN(func)) {
                okfunc = function (index) {
                    setTimeout(function () {
                        popsearch.closePopBox(index);
                    }, func);
                }
            } else {
                okfunc = function (index) {
                    if (type == 1) {
                        form.on('submit', function (data) {
                            if (!popsearch.form.okBtnIsSubmitFormCallBack(index)) {
                                return false;
                            }

                            var $res = func(index);
                            if (typeof($res) == 'undefined' || $res) {
                                popsearch.closePopBox(index);
                            }
                            return false;
                        });
                        if (popsearch.layeditIndex.length > 0) {
                            layui.use('layedit', function () {
                                var layedit = layui.layedit;
                                for (var i in popsearch.layeditIndex) {
                                    layedit.sync(popsearch.layeditIndex[i]);
                                }
                            });
                        }

                        $('.lay-submit').click();
                    } else {
                        var $res = func(index);
                        if (typeof($res) == 'undefined' || $res) {
                            popsearch.closePopBox(index);
                        }
                    }
                }
            }

            if (type == 1 || type == 3) {
                var open = {
                    type: 1,
                    skin: 'layui-layer-molv',
                    maxmin: true,
                    area: popsearch.layerWidth,
                    title: title,
                    content: content,
                    btn: ['确认', '取消'],
                    cancel: function (index) {
                        popsearch.closePopBox(index)
                    }
                };
                if (typeof(showok) == 'undefined' || showok) {
                    open.btn = ['确认', '关闭'];
                    if (typeof(showok) == 'object') {
                        open.btn = showok;
                    }
                    open.yes = okfunc;
                } else {
                    open.btn = ['关闭'];
                }

                if (typeof(cancelCallback) == 'function') {
                    open.btn2 = function (index, layero) {
                        cancelCallback(index, okfunc);
                        return false;
                    }
                }
                layer.open(open);
				//layer.full(open);
            } else {
                var option = {};
                if (typeof(showok) == 'undefined') {
                    option = {closeBtn: 1}
                } else if (typeof(showok) == 'object') {
                    option = showok;
                }
                layer.alert(content, option, function (index) {
                    okfunc(index);
                });
            }
        },

        /**
         * 关闭弹窗
         */
        closePopBox: function (index) {
            layer.close(index);
        },

        /**
         * 保存或更新数据后重新载入当前iframe
         */
        reloadCurrentIframe: function (url, data) {
            window.location.reload();
        },

        /**
         * 显示确认框
         *
         * @param tip 确认文字
         * @param func 点击确认执行的函数
         * @param option layer的配置项
         */
        showConfirm: function (tip, func, option) {
            popsearch.showPopBox(tip, 2, '确认?', func, option);
        },
        /**
         * 显示Loading
         */
        showLoading: function () {
            popsearch.loadingIndex = layer.load(2, {shade: 0.001});
        },
        /**
         * 关闭loading
         */
        closeLoading: function () {
            popsearch.loadingIndex > 0 && layer.close(popsearch.loadingIndex);
            popsearch.loadingIndex = 0;
        },

        //显示提示
        showMsg: function (msg, autoCloseTime) {
            if (typeof (autoCloseTime) == 'undefined') {
                autoCloseTime = 10000;
            }
            popsearch.showPopBox(msg, 2, '提示', autoCloseTime, false, false);
        },

        form: {
            //表单操作成功后的回调
            operateSuccessCallBack: function () {
            },

            //表单确认按钮的回调, 默认提交表单保存数据,如果这边return false。则不提交表单-用于二次确认的场景
            okBtnIsSubmitFormCallBack: function () {
                return true;
            },

            /**
             * 添加数据
             * @param title 表单标题
             * @param url 加载表单的url
             * @param purl 保存表单数据的url
             */
            add: function (title, url, purl, width, func, showok, cancelCallback) {
                return popsearch.form.edit(title, url, purl, width, func, showok, cancelCallback);
            },

            /**
             * 列表页面中打开子页面-没有确定取消按钮
             * @param title
             * @param url
             * @param width
             */
            view: function (title, url, width) {
                if (typeof (width) == 'undefined') {
                    width = false;
                }
                if (width) {
                    popsearch.layerWidth = width;
                } else {
                    popsearch.layerWidth = popsearch.preLayerWidth;
                }

                if (typeof(event) != "undefined") {
                    if (typeof(event.preventDefault) == 'function') {
                        event.preventDefault();
                    } else {
                        window.event.returnValue = false;
                    }
                }

                popsearch.getDataShowPop(url, title, undefined, false);
            },

            /**
             * 修改数据
             * @param title 表单标题
             * @param url 加载表单的url
             * @param purl 保存表单数据的url
             * @param width 弹出弹的宽高
             */
            edit: function (title, url, purl, width, func, showok, cancelCallback) {
                if (typeof (width) == 'undefined') {
                    width = false;
                }
                if (width) {
                    popsearch.layerWidth = width;
                } else {
                    popsearch.layerWidth = popsearch.preLayerWidth;
                }

                if (typeof(event) != "undefined") {
                    if (typeof(event.preventDefault) == 'function') {
                        event.preventDefault();
                    } else {
                        window.event.returnValue = false;
                    }
                }

                popsearch.getDataShowPop(url, title, function (index) {
                    var form = $('form.data_forum');
                    popsearch.showLoading();
                    $.ajax({
                        url: purl,
                        type: 'post',
                        dataType: 'json',
                        data: form.serialize(),
                        success: function (data) {
                            popsearch.closeLoading();
                            if (data.code == 0) {
                                popsearch.showTip(data.msg, function () {
                                    if (purl.replace('.html', '').substr(-12) != 'saveSelfInfo') {
                                        if (typeof(popsearch.currentDataPageUrl) != 'undefined' && popsearch.currentDataPageUrl != "" && !popsearch.dontReloadAjax) {
                                            popsearch.loadAjaxPage(popsearch.currentDataPageUrl);
                                        }
                                    }
                                    if (typeof (func) == 'function') {
                                        func(data.data);
                                    }
                                    popsearch.form.operateSuccessCallBack();
                                    popsearch.closePopBox(index);
                                });
                            } else if (data.code == -1000000) {
                                window.location.href = data.msg;
                            } else {
                                popsearch.showTip(data.msg);
                                return false;
                            }
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            popsearch.closeLoading();
                            popsearch.showTip(XMLHttpRequest.responseText);
                        }
                    });
                    return false;
                }, showok, cancelCallback);
            },

            /**
             * 删除数据的url
             *
             * @param url
             * @param id
             * @param msg
             */
            del: function (url, id, msg, func) {
                if (typeof(msg) == 'undefined' || msg == '') {
                    msg = '确定要删除ID为' + id + '的记录么？';
                }

                if (typeof(event) != "undefined") {
                    if (typeof(event.preventDefault) == 'function') {
                        event.preventDefault();
                    } else {
                        window.event.returnValue = false;
                    }
                }

                popsearch.showConfirm(msg, function () {
                    popsearch.loadUrl(url, 'json', function (data) {
                        popsearch.showTip(data.msg, function () {
                            if (!popsearch.dontReloadAjax) {
                                if (typeof (window.list) != 'undefined') {
                                    popsearch.loadAjaxPage(popsearch.currentDataPageUrl);
                                } else if (typeof(window.dontreload) == 'undefined') {
                                    popsearch.reloadCurrentIframe();
                                }
                            }
                            if (typeof (func) == 'function') {
                                func();
                            }

                            popsearch.form.operateSuccessCallBack();
                        });
                    });
                });
            },

            /**
             * 禁用解禁的url
             *
             * @param url
             * @param msg
             */
            disable: function (url, msg) {
                if (typeof(msg) == 'undefined' || msg == '') {
                    msg = '确定要操作么？';
                }
                popsearch.showConfirm(msg, function () {
                    popsearch.closePopBox(2);
                    popsearch.loadUrl(url, 'json', function (data) {
                        popsearch.showTip(data.msg, function (index) {
                            popsearch.loadAjaxPage(popsearch.currentDataPageUrl);
                        });
                        popsearch.form.operateSuccessCallBack();
                    });
                });
            }
        }
    };

    exports('popsearch', popsearch);
});
