<?php

// require_once "../../Class/autoload.php";
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// session_start(); 

// // Dummy value for development purposes
// $_POST ["RecieverID"] = "1001"; 
// //print_r($_POST); 

// //print_r($_SESSION); 

// $recieverID = $_POST["RecieverID"]; 
// $sender = $_SESSION["user"]; 

// $senderID = $sender->getEmpID(); 
// print_r($senderID); 

// $messageHistory = []; 

// if($_POST){
// $msgDAO = new MessageDAO();
// $messageHistory = $msgDAO->displayConversation($senderID, $recieverID); 
// }
// print_r($messageHistory); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbox</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    

    <script>
       $(function(){
         $('.datepicker').datepicker({
         format: 'mm-dd-yyyy'
       });
     });
    </script>
		<style>

			/*
			* Design Reference – https://codepen.io/juliepark/pen/QxWVPv
			*/

			/* basic */
				*,
			*:before,
			*:after {
				box-sizing: border-box;
			}
			html,
			body {
				height: 100%;
			}
			body {
				font: 16px/1.2 "Roboto", sans-serif;
				color: #333;
			}
			.blog {
				font-size: 14px;
				font-weight: bold;
				text-align: center;
				position: absolute;
				bottom: 15px;
				left: 50%;
				transform: translateX(-50%);
				z-index: 1;
			}
			.alink {
				display: inline-block;
				text-align: center;
				cursor: pointer;
			}
			input[type="text"],
			button {
				padding: 4px 8px;
				border: 0;
				outline: 0;
			}
			button {
				background-color: transparent;
				cursor: pointer;
			}
			button:hover i {
				color: #79c7c5;
				transform: scale(1.2);
			}

			/* container */
			.container {
				width: 450px;
				height: auto;
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				z-index: 1;
				border-radius: 10px;
				background-color: #f9fbff;
				box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
				overflow: hidden;
			}

			/* chat_box */
			.chat_box {
				display: flex;
				flex-direction: column;
				height: 100%;
			}
			.chat_box > * {
				padding: 16px;
			}

			/* head */
			.head {
				display: flex;
				align-items: center;
			}
			.head .user {
				display: flex;
				align-items: center;
				flex-grow: 1;
			}
			.head .user .avatar {
				margin-right: 8px;
			}
			.head .user .avatar img {
				display: block;
				border-radius: 50%;
			}
			.head .bar_tool {
				display: flex;
			}
			.head .bar_tool i {
				padding: 5px;
				width: 30px;
				height: 30px;
				display: flex;
				align-items: center;
				justify-content: center;
			}

			/* body */
			.body {
				flex-grow: 1;
				background-color: #eee;
			}
			.body .bubble {
				display: inline-block;
				padding: 10px;
				margin-bottom: 5px;
				border-radius: 15px;
			}
			.body .bubble p {
				color: #f9fbff;
				font-size: 14px;
				text-align: left;
				line-height: 1.4;
			}
			.body .incoming {
				text-align: left;
			}
			.body .incoming .bubble {
				background-color: #b2b2b2;
			}
			.body .outgoing {
				text-align: right;
			}
			.body .outgoing .bubble {
				background-color: #79c7c5;
			}


			/* foot */
			.foot {
				display: flex;
			}
			.foot .msg {
				flex-grow: 1;
			}

			@keyframes bounce {
				50% {
					transform: translate(0, 5px);
				}
				100% {
					transform: translate(0, 0);
				}
			}
			.ellipsis {
				display: inline-block;
				width: 5px;
				height: 5px;
				border-radius: 50%;
				background-color: #b7b7b7;
			}
			.dot_1 {
				/* animation: name duration timing-function delay iteration-count */
				animation: bounce 0.8s linear 0.1s infinite;
			}
			.dot_2 {
				animation: bounce 0.8s linear 0.2s infinite;
			}
			.dot_3 {
				animation: bounce 0.8s linear 0.3s infinite;
			}

			body {font-family: Arial, Helvetica, sans-serif;}
			* {box-sizing: border-box;}

			/* Button used to open the chat form - fixed at the bottom of the page */
			.open-button {
			background-color: #555;
			color: white;
			padding: 16px 20px;
			border: none;
			cursor: pointer;
			opacity: 0.8;
			position: fixed;
			bottom: 23px;
			right: 28px;
			width: 280px;
			}

			/* The popup chat - hidden by default */
			.chat-popup {
			display: none;
			position: fixed;
			bottom: 200px;
			right: 230px;
			border: 3px solid #f1f1f1;
			z-index: 9;
			}

			/* Add styles to the form container */
			.form-container {
			max-width: 300px;
			padding: 10px;
			background-color: white;
			}

			/* Full-width textarea */
			.form-container textarea {
			width: 100%;
			padding: 15px;
			margin: 5px 0 22px 0;
			border: none;
			background: #f1f1f1;
			resize: none;
			min-height: 200px;
			}

			/* When the textarea gets focus, do something */
			.form-container textarea:focus {
			background-color: #ddd;
			outline: none;
			}
      </style>
</head>

<body>
    <script>
      const app = Vue.createApp({
        data() {
            return {
                posts: [] // array of post objects
            }
        },
        created() { // created is a hook that executes as soon as Vue instance is created
            axios.get('http://localhost/SPM-team3-project/View/common/ChatProcess.php')
            .then(response => {
                // this gets the data, which is an array
                this.posts = response.data
                console.log(response.data);
            })
            .catch(error => {
                this.posts = [{ entry: 'There was an error: ' + error.message }]
            })
        }
        
    });
    app.component('message_item', {
        props:['id', 'name','link'],
        template:`
            <div>
              <div class="media text-muted pt-3">
              <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
              <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                  <strong class="text-gray-dark">{{ id }}</strong>
                  <a :href="link">Assign</a>
                </div>
                <span class="d-block">{{ name }}</span>
              </div>
            </div>
            </div>
        `
      });
    app.mount('#app');
    </script>
  <div id="chat">
	<button class="open-button" onclick="openForm()">Chat</button>
	<div class="chat-popup" id="myForm">
		<div class="container">
			<div class="chat_box">
				<div class="head">
					<div class="user">
						<div class="name">Guan Yu</div>
					</div>
				</div>
				<div class="body">
					<div class="incoming">
						<div class="bubble">
							<p>Good morning. Are you free now?</p>
						</div>
						<div class="bubble">
							<p>I would like to clarify something with you.</p>
						</div>
					</div>
					<div class="outgoing">
						<div class="bubble">
							<p>Sure. What's the problem you have got?</p>
						</div>
					</div>
					<div class="typing">
						<div class="bubble">
							<div class="ellipsis dot_1"></div>
							<div class="ellipsis dot_2"></div>
							<div class="ellipsis dot_3"></div>
						</div>
					</div>
				</div>
				<div class="foot">
					<input type="text" class="msg" placeholder="Type a message..." />
					<button type="submit">Submit</i></button>
				</div>
			</div>
		</div>
	</div>
  </div>
</body>

</html>

</body>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</html>
