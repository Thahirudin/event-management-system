<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $order->id }}</title>
</head>
    <style>
@import url("https://fonts.googleapis.com/css2?family=Staatliches&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap");

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

body,
html {
	height: 100vh;
	display: grid;
	font-family: "Staatliches", cursive;
	background: white;
	color: black;
	font-size: 12px;
	letter-spacing: 0.1em;
}

.ticket {
	margin: auto;
	display: flex;
	background: white;
	box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
}

.center {
	display: flex;
	text-align:center;
}
.the-show {
	position: absolute;
	color: black;
	height: 250px;
	padding: 0 10px;
	letter-spacing: 0.15em;
	display: flex;
	text-align: center;
	justify-content: space-around;
	writing-mode: vertical-rl;
	transform: rotate(-180deg);
	margin-right:20px;
}

.the-show span:nth-child(2) {	color: blue;
	font-weight: 700;

}

.center .ticket-number {
	height: 250px;
	width: 250px;
	display: flex;
	justify-content: flex-end;
	align-items: flex-end;
	padding: 5px;
	color:black;
}

.ticket-info {
	padding: 10px 30px;
	display: flex;
	flex-direction: column;
	text-align: center;
	justify-content: space-between;
	align-items: center;
}

.kategori {
	border-top: 1px solid gray;
	border-bottom: 1px solid gray;
	padding: 5px 0;
	font-weight: 700;
	display: flex;
	align-items: center;
	justify-content: space-around;
}

.kategori span {
	width: 200px;
}

.kategori span:first-child {
	text-align: left;
}

.kategori span:last-child {
	text-align: right;
}

.tanggal {
	color: #d83565;
	font-size: 20px;
}

.show-name {
	font-size: 32px;
	font-family: "Nanum Pen Script", cursive;
	color: #d83565;
}

.show-name h1 {
	font-size: 45px;
	font-weight: 700;
	letter-spacing: 0.1em;
	color:  #809bce;
}

.waktu {
	padding: 10px 0;
	color: #95b8d1;
	text-align: center;
	display: flex;
	flex-direction: column;
	gap: 10px;
	font-weight: 700;
	font-size:25px;
}

.waktu span {
	font-weight: 400;
	color:grey ;
	font-size:25px;
}

.lokasi {
	display: flex;
	justify-content: space-around;
	align-items: center;
	width: 100%;
	padding-top: 8px;
	border-top: 1px solid gray;
}

.lokasi .separator {
	font-size: 20px;
}

.right {
	width: 300px;
	border-left: 1px dashed #404040;
}

.right .the-show {
	color: black;
}

.right .the-show span:nth-child(2) {
	color: blue;
}

.right .right-info-container {
	height: 300px;
	padding: 10px 10px 10px 35px;
	display: flex;
	flex-direction: column;
	justify-content: space-around;
	align-items: center;
	font-size:25px;
	text-align:center;
}

.right .show-name h1 {
	font-size: 30px;
}
.right .ticket-number {
	color: gray;
}
.center-image{
	margin-left:10px;
};

</style>
<body>
<link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

<div class="ticket created-by-anniedotexe">
	<div class="center">
		<div class="center-image">
			<p class="the-show">
				<span>THE SHOW</span>
				<span>THE SHOW</span>
				<span>THE SHOW</span>
			</p>
			<img src="{{ asset('stemit') }}/assets/images/logo-full.png" height="50px">
			<div class="ticket-number">
			</div>
		</div>
		<div class="ticket-info">
			<p class="kategori">
				<span>{{ $order->event->kategori->nama }}</span>
				<span >{{ $order->event->kategori->nama }}</span>
				<span>{{ $order->event->kategori->nama }}</span>
			</p>
			<div class="show-name">
				<h1>{{ $order->event->nama_event }}</h1>
				<p>{{ $order->member->nama}}</p>
				
			</div>
			<div class="waktu">
				<p>{{ $order->event->waktu }}<span>
			</div>
			<p class="lokasi">
				<span class="separator"><i class="far fa-smile"></i></span><span>{{ $order->event->lokasi }}</span>
			</p>
		</div>
	</div>
	<div class="right">
		<p class="the-show">
			<span>THE SHOW</span>
			<span>THE SHOW</span>
			<span>THE SHOW</span>
		</p>
		<div class="right-info-container">
			<div class="show-name">
				<h1>{{ $order->event->nama_event }}</h1>
			</div>
			<p class="ticket-number">
			#{{ $order->id }}
			</p>
		</div>
	</div>
</div>
</body>
</html>

