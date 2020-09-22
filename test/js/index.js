 
        var url='./php/test_times.php?codes='+window.sessionStorage.getItem('user_codes')
        var timeers=setInterval(() => {
            axios.get(url).then(
                res=>{
                    if(res=='exit'){
                        alert('考试时间结束！');
                        clearInterval(timeers);
                        window.location.href='grade.html';
                    }else{
                        var arr=res.split(',');
                        console.log(arr[0])
                        $("#times").html(arr[0])
                        $("#user").html('&nbsp;'+arr[1])
                    }
                    
                }
            )
        },60000);
        function user_exit(){
            window.sessionStorage.setItem('user_codes',"");
            window.location.href='./login.html'
        }
        new Vue({
            el:'#app',
            data:{
                test_list:'',  // 题的集合
                title_num:1,   // 题号
                option_type:'',  // 选题类型
                next_but:false,   //下一题状态
                max_num:'',      //题的最大数
                prev_but:true,   //初始化第一题，不能有上一题
                data_mes:'准备答题',   //更新数据状态
                A:false,
                B:false,
                C:false,
                D:false,
            },
            mounted(){
               this.rand_test()
               this.max_nums()
               this.views()
            },
            // watch:{
            //     A:function(n,o){
            //         this.A=n
            //     },
            //     B:function(n,o){
            //         this.B=n
            //     },
            //     C:function(n,o){
            //         this.C=n
            //     },
            //     D:function(n,o){
            //         this.D=n
            //     }
            // },
            methods:{
                max_nums(){   //调用了随机题号的最大数
                   let url='./php/max_num.php';
                    axios.get(url).then(
                        res=>{
                            console.log(res)
                            this.max_num=res
                        }
                    )
                },
                rand_test(){
                    let url='./php/rand_title.php?codes='+window.sessionStorage.getItem('user_codes')+'&title_id='+this.title_num
                    axios.get(url).then(
                        res=>{
                            if(res=='no'){
                                this.rand_test()
                            }else if(res=='end'){
                                // var confrim=confirm('已经是最后一题，交卷吗？')
                                // if(confrim==true){
                                //     //
                                // }else{
                                //     //
                                // }
                                //window.location.href='grade.html'   //没题了交卷
                            }else{
                                this.test_list=res
                                this.title_num=res.title_len;  //题号
                                this.option_type=res.types;   //选题类型
                            }
                            //console.log(this.option_type,this.title_num)
                        }
                    )
                },
                views(){
                    let url='./php/states.php?codes='+window.sessionStorage.getItem('user_codes')+'&title_num='+this.title_num
                    //下一题后调用
                    console.log('题号：',this.title_num)
                    axios.get(url).then(
                        res=>{
                            //console.log(res)
                            if(res=="empty"){
                                $("input").removeAttr('checked')  //新题清空
                                this.A=false,this.B=false,this.C=false,this.D=false  //初始化
                            }else{
                                // this.A=res.search('A')>=0?true:false
                                // this.B=res.search('B')>=0?true:false
                                // this.C=res.search('C')>=0?true:false
                                // this.D=res.search('D')>=0?true:false
                                // console.log(this.A,this.B,this.C,this.D)
                                var a=res.search('A')>=0?true:false
                                var b=res.search('B')>=0?true:false
                                var c=res.search('C')>=0?true:false
                                var d=res.search('D')>=0?true:false
                                
                                if(a){
                                    $('.A').prop('checked',true)
                                }else{
                                     $('.A').prop('checked',false)
                                }

                                if(b){
                                    $('.B').prop('checked',true)
                                }else{
                                     $('.B').prop('checked',false)
                                }

                                if(c){
                                    $('.C').prop('checked',true)
                                }else{
                                     $('.C').prop('checked',false)
                                }
                                if(d){
                                    $('.D').prop('checked',true)
                                }else{
                                     $('.D').prop('checked',false)
                                }
                                
                            }
                        }
                    )
                    //this.A=false,this.B=false,this.C=false,this.D=false  //初始化
                    //$("input").removeAttr('checked')
                   // $("input[type='checkbox']").removeAttr('checked')
                },
                title_next(){
                    this.title_num= Math.floor(this.title_num)+1
                    if(this.title_num>=this.max_num){
                        this.title_num=this.max_num
                        this.next_but=true
                    }else{
                        this.next_but=false
                    }
                    //this.views()   //往前提…
                    this.rand_test()
                    this.prev_but=false   //点击下一题按钮时，下一题按钮可用
                    //提交答案
                    //省份证号 window.sessionStorage.getItem('user_codes')
                    //自己的题号：this.title_num
                    //答案
                    //题型this.option_type
                      var val=''   // 答案
                      if(this.option_type=='单选'){
                          //console.log($("input[name='radio']:checked").val())
                          val=$("input[name='radio']:checked").val()   // 单选答案
                      }else{
                          var check=$("input[name='checkbox']:checked")
                          for(var i=0;i<check.length;i++){
                              if(i==check.length-1){   //一个值
                                val=val+check[i].value 
                              }else{   //多个值
                                  val=val+check[i].value+','
                              }
                              //console.log(check[i].value)
                          }   
                      } 
                      //console.log(val);
                      //提交答案
                      let url='./php/res.php?codes='+window.sessionStorage.getItem('user_codes')+'&title_num='+(this.title_num-1)+'&res='+val+'&max_num='+this.max_num;
                      //http://localhost/test/php/res.php?codes=132522198802031234&title_num=1&res=B&max_num=4
                      axios.get(url).then(
                          res=>{
                              //console.log(res)
                              this.data_mes=res;   // 答题状态
                          }
                      )
                      this.views()
                },
                title_prev(){
                    this.title_num= Math.floor(this.title_num)-1
                    if(this.title_num<=1){
                        this.title_num=1  //第一题，上一题按钮不可用
                        this.prev_but=true  
                    }else{
                        this.prev_but=false   
                    }
                    this.rand_test()
                    this.next_but=false   //下一题按钮可用
                    this.views()
                }
            }
        })