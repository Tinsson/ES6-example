class EventEmitter {
  constructor(){
    this.queue = [];
  }
  
  on(name,func){
    const handler = {
      name: name,
      func: func
    }
    this.queue.push(handler);
  }
  
  off(oname,ofunc){
    const queue = this.queue;
    let num;
    if(queue.length == 0){
      return false;
    }
    queue.forEach((handler,index)=>{
      if(handler.name == oname && handler.func == ofunc){
        num = index;
      }
    })
    queue.splice(num,1);
  }
  
  emit(sname,...arg){
    if(this.queue.length == 0){
      return false;
    }
    this.queue.forEach((handler)=>{
      if(handler.name == sname){
        handler.func(...arg);
      }
    })
  }
}
//观察者模式，类似jquery绑定事件