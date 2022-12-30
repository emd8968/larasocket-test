<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="/app.js"></script>
    <script defer>
        let person = prompt("Please enter your name", "");
        window.username = person;

        window.Echo.channel(`chat-channel`)
            .listen("ChatEvent", (data) => {

                var item = document.createElement('li');
                item.textContent = data.chatObject.sender + ": " + data.chatObject.message;

                document.getElementById('messages').appendChild(item)


                console.log("New Chat");
            });


        function onSendClick() {
            let params = {
                sender: window.username
            }
            params.message = document.getElementById('txt-message').value;
            params._token = "{{ csrf_token() }}";
            let post = JSON.stringify(params)
            const url = "chat"
            let xhr = new XMLHttpRequest()
            xhr.open('POST', url, true)
            xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
            xhr.send(post);
            xhr.onload = function () {
                if (xhr.status === 201) {
                    console.log("Post successfully created!")
                }
            }
            document.getElementById('txt-message').value = "";
        }
    </script>
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
        }

        #chat-form {
            border: 1px solid #e6e6e6;
            width: 100%;
            margin-right: auto;
            margin-left: auto;
        }

        .form-box {
            padding: 5px;
        }

        .chat-box {
            position: relative;
            border: 1px solid #4da6ff;
            padding: 5px;

        }

        .chat-head {
            text-align: center;
        }

        .head-image img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .head-name span {
            color: #8c8c8c;
        }

        .message-con {
            overflow-y: scroll;
            height: 200px;
            width: 100%;
        }

        /*scroll bar*/
        ::-webkit-scrollbar {
            width: 10px;

        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #ffffff;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #4da6ff;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /*scroll bar*/

        .text-field {
            display: flex;
            margin-top: 7px;
        }

        .form-container {
            width: 100%;
            margin-right: 20px;
        }

        .text-form {
            margin-top: 5px;
        }

        .text-form input[type="text"] {
            width: 100%;
            height: 28px;
            font-size: 15px;
            border-radius: 20px;
            border: 1px solid #4da6ff;
            padding-left: 10px;
            transition: 0.5;
        }

        .text-form input[type="text"]:hover {
            border: 1px solid #e6e6e6;
        }

        .submit-btn button {
            height: 40px;
            width: 80px;
            /*padding: 8px;*/
            border-radius: 10%;
            border: 1px solid #4da6ff;
            background-color: #4da6ff;
            color: #ffffff;
            font-size: 18px;
            text-align: center;
            cursor: pointer;
        }


        /*message bubble*/
        #messages {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        #messages li {
            background-color: #4da6ff;
            color: #ffffff;
            font-size: 15px;
            border-radius: 20px;
            padding: 10px;
            margin: 10px;
            width: fit-content;
            word-break: break-all;
            font-family: 'Roboto', sans-serif;
        }

        /*message bubble*/


    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<div id="chat-form">
    <div class="form-box">
        <div class="chat-box">
            <div class="message-con">
                <ul id="messages"></ul>
            </div>
        </div>
        <div class="text-field">
            <div class="form-container">
                <form class="text-form">
                    <input id="txt-message" type="text" placeholder="Message">
                </form>
            </div>

            <div class="submit-btn">
                <button onclick="onSendClick()">Send</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
