<?php
session_start();
var_dump($_SESSION);
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

	<script src="https://unpkg.com/vue@3.0.5"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

	<script>
		$(function() {
			$('.datepicker').datepicker({
				format: 'yyyy-mm-dd'
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
			position: relative;
			min-height: 500px;
			max-height: 500px;
			overflow-y: auto;
			padding: 10px 30px 20px 30px;
			background: #f7f7f7;
			box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
						inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
		}

		.chat_box>* {
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
			padding: 18px 30px;
            		display: flex;
           		justify-content: space-between;
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

		body {
			font-family: Arial, Helvetica, sans-serif;
		}

		* {
			box-sizing: border-box;
		}

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

	<div id="chat">
		{{ senderID}} <br>
		{{ recieverID}} <br>
		{{ msgList}} <br>

			<div class="container">
				<div class="chat_box">
					<div class="head">
						<div class="user">
							<div class="name" id="name">Guan Yu</div>
						</div>
					</div>
					<div class="body">
						
						<div v-for="msg of msgList">
							<div v-if="msg['sender'] == senderID" class="outgoing">
								<div class="bubble">
									<p>{{msg['message']}}</p>
								</div>
							</div>
							<div v-else class="incoming">
								<div class="bubble">
									<p>{{msg['message']}}</p>
								</div>
							</div>
						</div>
						<!-- <div>
						<div class="incoming">
							<div class="bubble">
								<p>Good morning. Are you free now?</p>
							</div>
						</div>
						</div>
						<div class="incoming">
							<div class="bubble">
								<p>I would like to clarify something with you.</p>
							</div>
						</div>
						<div class="outgoing">
							<div class="bubble">
								<p>Sure. What's the problem you have got?</p>
							</div>
						</div> -->
						<!-- <div class="typing">
							<div class="bubble">
								<div class="ellipsis dot_1"></div>
								<div class="ellipsis dot_2"></div>
								<div class="ellipsis dot_3"></div>
							</div>
						</div> -->
					</div>
				</div>
				<div class="foot">
					<input type="text" class="msg" placeholder="Type a message..." v-model="messageContent" />
					<button v-on:click="sendMsg()" type="submit">Submit</i></button>
				</div>
			</div>
		
		</div>
</body>

</html>

</body>


<script>
	const app = Vue.createApp({
		data(){
			return{
				senderID:<?php echo $_SESSION['userID'];?>,
				recieverID:<?php echo $_GET["chatID"]; ?>, 
				messageContent:"",
				msgList: []
			}
		},
		methods:{
			sendMsg(){
				console.log("send");
				axios.get("./ChatProcess.php",{
				params:{
					send: true,
					sender: this.senderID,
					receiver: this.recieverID,
					msg: this.messageContent
				}
				}).then(response=>{
					console.log(response.data);
					// remember check data before doing any other things 
					this.messageContent = "";
					this.displayMsg();
				}).catch(error=>{
					console.log(error.message);
				});
			},
			displayMsg(){
				axios.get("./ChatProcess.php",{
				params:{
					receive: true,
					sender: this.senderID,
					receiver: this.recieverID
				}
				}).then(response=>{
					console.log(response.data);
					// remember check data before doing any other things 
					this.msgList=response.data;
				}).catch(error=>{
					console.log(error.message);
				});
			}
		}, created(){
			this.displayMsg();
			this.interval = setInterval(() => this.displayMsg(), 2000);
		}
	});
	// app.component('display-msg',{
	// 	component:['sender', 'crrUser', 'message', 'time'],
	// 	template:`
    //     				<div v-if="sender == crrUser" class="outgoing">
	// 						<div class="bubble">
	// 							<p>{{message}}</p>
	// 						</div>
	// 					</div>
	// 					<div v-else class="incoming">
	// 						<div class="bubble">
	// 							<p>{{message}}</p>
	// 						</div>
	// 					</div>
    // 	`
	// });
	app.mount('#chat')
</script>

<script>
	function openForm() {
		document.getElementById("myForm").style.display = "block";
	}

	function closeForm() {
		document.getElementById("myForm").style.display = "none";
	}
</script>

</html>
