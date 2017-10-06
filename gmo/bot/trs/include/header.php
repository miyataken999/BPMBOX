<SCRIPT>
alert("est");
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-73563972-2', 'auto');
  ga('send', 'pageview');

</SCRIPT><SCRIPT>
        var flag_speech = 0;
        var flag_speech2 = 0;
/**
@function vw_function2
@日本語での会話
*/
      function vr_function2() {
    window.SpeechRecognition = window.SpeechRecognition || webkitSpeechRecognition;
    var recognition = new webkitSpeechRecognition();
    if(jQuery("#ling").val()=="Contains"){
        recognition.lang = 'ja';
    }else{
        recognition.lang = 'en-US';
    }
    //recognition.lang = 'en';
    recognition.interimResults = true;
    recognition.continuous = true;
    //最大10個の認識仮説を取得する
recognition.maxAlternatives = 1;

    recognition.onsoundstart = function () {
        document.getElementById('status').innerHTML = "認識中";
    };
    recognition.onnomatch = function () {
        document.getElementById('status').innerHTML = "もう一度試してください";
    };
    recognition.onerror = function () {
        document.getElementById('status').innerHTML = "エラー";
        if (flag_speech2 == 0)
            vr_function2();
    };
    recognition.onsoundend = function () {
        document.getElementById('status').innerHTML = "停止中";
        vr_function2();
    };

    recognition.onresult = function (event) {
        var results = event.results;
        //alert("test");
        for (var i = event.resultIndex; i < results.length; i++) {
            if (results[i].isFinal) {
                document.getElementById('ctrspeech2').value = results[i][0].transcript;
                //document.getElementById('ctlSearchFor1').value = results[i][0].transcript;

                setTimeout('jQuery("#New_Button_6").click()', 0);
                setTimeout('jQuery("#New_Button_11").click()', 0);
                //setTimeout('jQuery("#New_Button_16").click()', 3000);
                setTimeout('jQuery("#New_Button_26").click()', 0);

                //jQuery("#New_Button_11").click() ;

                //jQuery("#New_Button_16").click() ;
                //jQuery("#New_Button_26").click() ;


                // 話すための機能をインスタンス化して、色々と値を設定します.
                var msg = new SpeechSynthesisUtterance();
                // var voices = window.speechSynthesis.getVoices();
                // msg.volume = 1;
                // msg.rate = 1;
                // msg.pitch = 2;
                // テキストスピーチ開始
                msg.text = results[i][0].transcript;//document.querySelector('#text1').value; // しゃべる内容
                // msg.lang = voices[0];//"ja-UP";
                // parent.document: for Opera compatibility
                var target = (parent.postMessage ? parent : (parent.document.postMessage ? parent.document : undefined));
                window.opener.postMessage({token: msg.text, secret: 'bbb'}, 'http://dev.bpm999.com');
                //alert(target);

                if (typeof target != 'undefined') {
                    //target.postMessage('from fuga to hoge', '*')
                    console.log("post message from iframe");
                }

                //  speechSynthesis.speak(msg);
                vr_function2();
                //if(results[i][0].transcript == "検索")

            }
            else {
                document.getElementById('ctlSearchFor1').value = "[途中経過] " + results[i][0].transcript;
                flag_speech2 = 1;
            }
        }
    }
    flag_speech2 = 0;
    //document.getElementById('status').innerHTML = "start";
    recognition.start();
}
/**
@function vw_function2
@英語での会話
*/
        function vr_function() {
            window.SpeechRecognition = window.SpeechRecognition || webkitSpeechRecognition;
            var recognition = new webkitSpeechRecognition();
            recognition.lang = 'en';
            recognition.interimResults = true;
            recognition.continuous = true;
 
            recognition.onsoundstart = function() {
                document.getElementById('status').innerHTML = "認識中";
            };
            recognition.onnomatch = function() {
                document.getElementById('status').innerHTML = "もう一度試してください";
            };
            recognition.onerror = function() {
                document.getElementById('status').innerHTML = "エラー";
                if(flag_speech == 0)
                  vr_function();
            };
            recognition.onsoundend = function() {
                document.getElementById('status').innerHTML = "停止中";
                  vr_function();
            };
 
            recognition.onresult = function(event) {
                var results = event.results;
                for (var i = event.resultIndex; i < results.length; i++) {
                    if (results[i].isFinal)
                    {
                        document.getElementById('ctlSearchFor1').value = results[i][0].transcript;
                        jQuery("#New_Button_16").click()
                       // 話すための機能をインスタンス化して、色々と値を設定します.
                       var msg = new SpeechSynthesisUtterance();
                       msg.volume = 1;
                       msg.rate = 1;
                       msg.pitch = 2;
                       // テキストスピーチ開始
                       msg.text = results[i][0].transcript;//document.querySelector('#text1').value; // しゃべる内容
                       //msg.lang = "ja-UP";
                       msg.lang = "en-US";
                       //speechSynthesis.speak(msg);
                       vr_function();
                    }
                    else
                    {
                        document.getElementById('ctlSearchFor1').value = "[途中経過] " + results[i][0].transcript;
                        flag_speech = 1;
                    }
                }
            }
            flag_speech = 0;
            //document.getElementById('status').innerHTML = "start";
            recognition.start();
        }
vr_function2();


// postMessageが呼び出された後に呼び出されます。
function receiveMessage(event)
{
    
  //alert("test");
  // このメッセージの送り元を信頼しますか?
  //console.log("test");
  console.log(event.data);
  //console.dir(event);
  if (event.origin !== "http://dev.bpm999.com")
    return;
  // event.sourceは、window.openerです。
  // event.dataは、"こんにちは!"です。
  // 受け取ったメッセージの生成元が検証済みの場合、
  // (どのようなケースでも検証を行うべきです)
  // メッセージに応答して返信する便利な方法は、
  // event.source上のpostMessageを呼び出し、
  // そのtargetOriginとして、event.originを提供することです。
  //event.source.postMessage("こんにちは! 秘密の応答は" +"rheeeeet!です。",event.origin);
}
//attache event function (reciveMeessage to postmesage)
window.addEventListener("message", receiveMessage, false);
    </SCRIPT>



 
