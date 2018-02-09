<?php
$name="text.txt";
if($_SERVER['REQUEST_METHOD']=='GET'){
    if(!empty($_GET['type'])&&$_GET['type']=="l"){
        $text=file_get_contents($name);
        die($text);
    }
}
elseif($_POST['type']=='s'){
    $text=$_POST['text'];
    file_put_contents($name,$text);
}?>
<title>信息传输</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<script src="jquery-3.3.1.min.js"></script>
<style>
    textarea{width: 100%;height:20rem;outline-color: transparent }
    .button{text-align: center;margin-top: 1rem}
    button{margin-left: 1rem;margin-right: 1rem;background: transparent;border:1px solid }
</style>
文本传输
<textarea id="a">
</textarea>
<div class="button">
    <button onclick="save()">存值</button>
    <button onclick="load()">取值</button>

</div>
<script>
var type="s"
function send(){
	var box=$("#a")
	if(type=="l"){
		$.get("",{type:type},function(a){
			box.val(a)
		})
	}
	else{
		var text=box.val()
$.post("",{type:type,text:text},function(){
	alert("已保存")
})
	}
}
function save(){
	type="s"
	send()
}
function load(){
	type="l"
	send()
}
</script>