<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>test</title>
	<style>
		.test{
			font-size: 18px;
			color: #333;
			margin-top: 10px;
		}
		.test:nth-child(1){
			width: 100px;
			padding-top: 10%;
			background-color: #ff6d00;
		}
		#iptbox::-webkit-datetime-edit-week-field{
			padding: 10px;
			width: 500px;
		}
	</style>
</head>
<body>
	<div class="test">It</div>
	<div class="test">is</div>
	<div class="test">work</div>
	<a href="tel:18368092182" style="font-size:25px;" class="test">1</a>
	<input id="iptbox" type="date">
	<textarea id="text11" cols="30" rows="10"></textarea>
	<a href="javascript:;" id="textaa" onclick="subtext()">check</a>
	<script>
		let textaa = document.getElementById("textaa");
		let text11 = document.getElementById("text11");
		function subtext(){
			var value = text11.value;
			console.log(value.replace('/n','<br/>'));
		}
		let {log, sin, cos} = Math;
		sin(5,3);//-0.95892427...
		var arr = [1,2,3,8];
		var {0: first,[arr.length-1]:last} = arr;
		console.log(last);
		[[1,2],[3,4]].map(([a,b]) => console.log(a+b));
		var x = 1,y = 2;
		[x,y] = [y,x];
		console.log(x,y);
		var map = new Map();
		map.set("first","hello");
		map.set("second","world");
		for(let [key, val] of map){
			console.log(key+" is "+val);
		}
		var y = new Array(3).fill(7);
		console.log(y[1]);
		navigator.geolocation.getCurrentPosition(function(p){
			var lat = p.coords.latitude;
			var lon = p.coords.longitude;
			console.log(lat,lon);
		})
		console.log(y.includes(7));
		function throwIfMissing(){
			throw new Error("Missing parameter");
		}
		function foo(some = undefined){
			return some;
		}
		console.log(foo());
		function add(...values){
			let sum = 0;
			for(var val of values){
				sum += val;
			}
			console.log(sum);
		}
		add(1,2,3,4,5);
		const sortNum = (...numbers) => console.log(numbers.sort());
		sortNum(1,5,3,-4,2);
		function push(arr,...items){
			items.forEach(function(item){
				arr.push(item);
				console.log(item);
			});
		}
		// Ìí¼ÓÒ»¶ÎÊý×éµ½ÁíÒ»¶Î
		var arr1 = [1,2,5,4],
			arr2 = [6,3,8];
		arr1.push(...arr2);
		console.log(arr1);
		const [first1, ...rest] = [1,2,4];
		console.log(first1,rest);
		function* fib(max){
			var t,a=0,b=1,n=1;
			while(n<max){
				yield a;
				t = a + b;
				a = b;
				b = t;
				n++;
			}
			return a;
		}
		var exfib = fib(5);
		var o = {
			sm:"some",
			out() {
				return this.sm;
			}
		}
		// Ä£¿éÊä³ö±äÁ¿ÊÊºÏÊ¹ÓÃ¼ò½àÐ´·¨
		// module.exports = {getItem,setItem,clear};
		let obj = { 1: `ni`,2: `wo`,3: `ta`,length: 3,
			[Symbol.iterator]: function(){
			var nextI = 1;
			var that = this;
			return {
				next:() => {
					let value = that[nextI];
					let done = (nextI > that.length);
					nextI++;
					return {value,done}
				}
			}
		}
		};
		let {keys, values, entries} = Object;
		for(let [key, val] of entries(obj)){
			console.log(val);
		}
		var z = Symbol('foo');
		var a = {a:123};
		a[z] = "first s";
		a.name = "foobar";
		console.log(a);
		let calc = {a:"qwer"};

		var proxy = new Proxy(calc,{
			get: function(target, property){
				if(property in target){
					return target[property];
				}else{
					throw new ReferenceError(`property ${property} dose not exist`)
				}
			}
		})
		console.log(Reflect.has(calc,"a"));	
		var testArr = [1,2,3,"1",'2',5,6,6];
		var map = new Map();
		map.set(testArr,"correct");
		map.get(testArr);//correct
		var ele = document.querySelectorAll(".test");
		[...ele].map((that)=> console.log(that.innerHTML));//±éÀúÊý×é£¬Ïàµ±ÓÚeach
		function* fiboiner(){
			yield "some1";
			yield "some2";
		}
		function* fibonacci(){
			yield "y1";
			yield* fiboiner();
			yield "y2";
			return 123;
			yield 4;
		}
		var gene = fibonacci();
		for(let v of gene){
			console.log(v);
		}
		var promise = new Promise((resolve,reject) => {
			console.log("do sth1");
			if(true){
				resolve("pass");
			}else{
				reject("error");
			}
		})
		promise.then((res)=>{console.log("do sth1.5,res:"+res);return "some3";},()=>{console.log("do sth2.5")}).then((some)=>{console.log(some)});
		console.log("some4");//ÑéÖ¤Òì²½²Ù×÷

		// promiseÊµÏÖajax²Ù×÷
		var getJSON = function(url){
			var promise = new Promise(function(resolve,reject){
				var client = new XMLHttpRequest();
				client.open("GET",url);
				client.onreadystatechange = handler;
				client.responseType = "json";
				client.setRequestHeader("Accept","application/json");
				client.send();
				function handler(){
					if(this.readyState !==4){
						return;
					}
					if(this.status === 200){
						resolve(this.response);
					}else{
						reject(new Error(this.statusText));
					}
				};
			});
			return promise;
		}
		getJSON("./ajax.json").then(function(json){
			console.log("contents:"+json.name);
		},function(error){
			console.error("³ö´íÁË",error);
		})
		// promiseÊµÏÖajax²Ù×÷
		// thunkº¯Êý×ª»»Æ÷
		var Thunk = function(fn){
			return function(...args){
				return function(callback){
					return fn.call(this,...args,callback);
				}
			}
		}
		class point {
			constructor(x,y){
				this.x = x;
				this.y = y;
				if(new.target === point){//ÀûÓÃnew.targetÌØÐÔÐ´Ò»¸ö¼Ì³Ð²ÅÄÜÊ¹ÓÃµÄÀà
					throw new Error("±¾Àà²»ÄÜÊµÀý»¯");
				}
			}
			output(){
				return this.x+" and "+this.y;
			}
		}
		class area extends point{
			constructor(x,y,co){
				super(x,y);
				this.co = co;
			}
			input(aaa){
				this.x = aaa;
			}
		}
		function callmobile(num = ""){
			if(num == ""){
				alert("ÊÇ¿ÕµÄ");
			}else{
				alert("²»ÊÇ¿ÕµÄ"+num);
			}
		}

		function strcurry(str){
			var st = function(str2){
				return str+ ","+str2;
			}
			return st;
		}
		console.log(strcurry("aaa")("bbb"));
		var obj_aa = {};
		//setºÍgetÓëvalue,config²»ÄÜÔÚÍ¬Ò»¶ÔÏó
		Object.defineProperty(obj_aa,'b',{
			get: function(){
				console.log("getÁËobj_aa");
				return 2222;
			}
		})
		console.log(obj_aa);
		//Ìø×ªÀ¹½Ø
		function gotourl(url){
		    var a = $('<a href="'+ url +'" target="_blank">Á´½Ó</a>');  //Éú³ÉÒ»¸öÁÙÊ±Á´½Ó¶ÔÏó
		    var d = a.get(0);
		    var e = document.createEvent('MouseEvents');
		    e.initEvent( 'click', true, true );  //Ä£Äâµã»÷²Ù×÷
		    d.dispatchEvent(e);
		    a.remove();   // µã»÷ºóÒÆ³ý¸Ã¶ÔÏó
		}
		console.log("arrrrrrrrrrr:"+ Object.keys(arr));
		
		function rndnum(m){
			var arr1 = new Array(m);
			for(var i = 0;i < m;i++){
				arr1[i] = i;
			}
			var arr2 = new Array();
			for(var i = 0;i < m;i++){
				var rnd = Math.floor(Math.random() * (i+1));
				[arr1[rnd],arr1[i]] = [arr1[i], arr1[rnd]];
			}

			return arr1;
		}
		console.log(rndnum(10));
	</script>
</body>
</html>