Runner.pages.PageSettings.addPageEvent('dtb_product', Runner.pages.constants.PAGE_LIST, "afterPageReady", function (pageObj, proxy, pageid) {
    pageObj.buttonNames[pageObj.buttonNames.length] = 'New_Button';
    if (!pageObj.buttonEventBefore['New_Button']) {
        pageObj.buttonEventBefore['New_Button'] = function (params, ctrl, pageObj, proxy, pageid, rowData, row) {
            console.dir(params);
            console.dir(ctrl);
            console.dir(row);
            params["txt"] = jQuery("#ctrspeech2").val();
            ctrl.setMessage("Sending request to server...");
        }
    }
    if (!pageObj.buttonEventAfter['New_Button']) {
        pageObj.buttonEventAfter['New_Button'] = function (result, ctrl, pageObj, proxy, pageid, rowData, row) {
            var message = result["txt"] + "";
            console.log(result['jtxt']);
            var $jmessage = result['jtxt'];
            jQuery("#english").val(message);
            jQuery("#jtext").val($jmessage);
            ctrl.setMessage(message);
            var msg = new SpeechSynthesisUtterance();
            msg.volume = 1;
            msg.rate = 1;
            msg.pitch = 2;
            //alert(result['txt']);
            //alert(jQuery("#ctlSearchFor1").val());
            msg.text = jQuery("#english").val(); //result['txt'];//"i am a google";//message
            //alert(msg.text);
            msg.lang = "en-US";
            speechSynthesis.speak(msg);
            //jQuery("#searchButtTop1").click();
            //msg.text = $jmessage;
            //msg.lang = "ja-UP";
            //speechSynthesis.speak(msg);
        }
    }
    $('a[id="New_Button"]').each(function () {
        if ($(this).closest('.gridRowAdd').length) {
            return;
        }
        this.id = "New_Button" + "_" + Runner.genId();
        var button_New_Button = new Runner.form.Button({
            id: this.id,
            btnName: "New_Button"
        });
        button_New_Button.init({
            args: [pageObj, proxy, pageid]
        });
    });
});
Runner.pages.PageSettings.addPageEvent('dtb_product', Runner.pages.constants.PAGE_LIST, "afterPageReady", function (pageObj, proxy, pageid) {
    pageObj.buttonNames[pageObj.buttonNames.length] = 'New_Button1';
    if (!pageObj.buttonEventBefore['New_Button1']) {
        pageObj.buttonEventBefore['New_Button1'] = function (params, ctrl, pageObj, proxy, pageid, rowData, row) {
            params["txt"] = "Hello";
            ctrl.setMessage("Sending request to server...");
        }
    }
    if (!pageObj.buttonEventAfter['New_Button1']) {
        pageObj.buttonEventAfter['New_Button1'] = function (result, ctrl, pageObj, proxy, pageid, rowData, row) {
            var message = result["txt"] + " !!!";
            ctrl.setMessage(message);
        }
    }
    $('a[id="New_Button1"]').each(function () {
        if ($(this).closest('.gridRowAdd').length) {
            return;
        }
        this.id = "New_Button1" + "_" + Runner.genId();
        var button_New_Button1 = new Runner.form.Button({
            id: this.id,
            btnName: "New_Button1"
        });
        button_New_Button1.init({
            args: [pageObj, proxy, pageid]
        });
    });
});
