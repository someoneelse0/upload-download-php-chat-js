const app=require("express")();
const http=require("http").createServer(app);
const cors=require("cors");
const io=require("socket.io")(http);
app.use(cors());
app.get("/",(req,res)=>{
	res.sendFile(__dirname+"/sock.html");
});
app.get("/word",(req,res)=>{
	res.sendFile(__dirname+"/word.png");
});
io.on("connection",(s)=>{
	console.log(s.id+" is now connected");
	s.on("f0",(d)=>{
		io.sockets.emit("f0",d);
	});
	s.on("disconnect",()=>{
		console.log(s.id+" has been gone");
	});
});
http.listen(3030,()=>{console.log("running on 3030")})
