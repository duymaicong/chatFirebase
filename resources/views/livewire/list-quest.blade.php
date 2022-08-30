<div>
    <section class="page page-center" style="background-color: #eee;">
        <div class="container">

            <div class="row d-flex justify-content-center ">
                <div class="col-md-10 col-lg-8 col-xl-6 ">

                    <form wire:submit.prevent="submit">
                        <div class="card " id="chat2">
                            <div class="card-header d-flex justify-content-between align-items-center p-3" id="navbar-example3">
                                <h5 class="mb-0">List-Quest</h5>
                            </div>
                            <div class="card-body overflow-auto " style="position: relative; height: 500px;">

                                @if(!empty($list_quest))
                                @foreach ($list_quest as $k => $v)

                                @if($k==$list_key[$index])
                                <div class="d-block my-1">
                                    <div>
                                        <p id="time"></p>
                                    </div>
                                    <div>
                                        <p class="py-2">{{$v['question']}}:</p>
                                    </div>
                                    <div>
                                        <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">{{$v['description']}}</p>
                                    </div>
                                </div>

                                @endif

                                @endforeach
                                @endif

                            </div>
                            <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 3" style="width: 40px; height: 100%;">
                                <input type="text" class="form-control form-control-lg" id="exampleFormControlInput1" wire:model.defer="content">
                                <button type="submit" class="btn btn-primary">

                                    Gửi
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>

    @push('script')
    <script>
        /**
         * name ckient
         */
        var name_client = (Math.random() + 1).toString(36).substring(7);

        var time = 0;



        /**
         * get data 
         */
        const database = firebase.database();

        var quest, key, index = 0,
            totalKey = 0;
        var check = 0;
        var dbRef = firebase.database().ref();
        var checkIndex, time = 0;

        /**
         * update client connect
         */


        var newPostKey = database.ref('connection/list-quest').push().getKey();


        database.ref('connection/list-quest/' + newPostKey) // this is the root reference
            .update({
                key: newPostKey,
                name: name_client
            });
        database.ref('disconnection/list-quest/' + newPostKey) // xóa trạng thái disconnect
            .remove();

        // trang thái hoạt động
        var presenceRef = firebase.database().ref("disconnection/list-quest/" + newPostKey);
        var presenceConnectRef = firebase.database().ref('connection/list-quest/' + newPostKey);
        // Write a string when this client loses connection
        presenceRef.onDisconnect().update({
            key: newPostKey,
            name: name_client
        });
        // xóa connect trong database
        presenceConnectRef.onDisconnect().remove();

        /**
         * kiểm tra kết nối
         */
        var connectedRef = firebase.database().ref(".info/connected");
        connectedRef.on("value", (snap) => {
            if (snap.val() === true) {
                database.ref('connection/list-quest/' + newPostKey) // this is the root reference
                    .update({
                        key: newPostKey,
                        name: name_client
                    });
                database.ref('disconnection/list-quest/' + newPostKey) // xóa trạng thái disconnect
                    .remove();
                console.log("connected");
            } else {
                console.log("not connected");
            }
        });


        // realtime
        var questCountRef = firebase.database().ref('question/');
        var listener = questCountRef.on('value', (snapshot) => {
            quest = snapshot.val();
            key = Object.keys(quest);
            // totalKey = key.lenght;
            checkIndex = key[index];
            time = quest[checkIndex].time;
            @this.set("list_quest", quest);
            @this.set("list_key", key);

        });

        var indexCountRef = firebase.database().ref('index/');
        indexCountRef.on('value', (snapshot) => {
            index = snapshot.val();
            checkIndex = key[index];
            time = quest[checkIndex].time;
            @this.set("index", index);


        });





        function timeOut() {
            document.getElementById('time').innerHTML = time;
            time--;
            if (time <= 0) {
                index++;
                if (index >= key.length) {
                    index = 0;
                }
                @this.set("index", index);
                time = quest[key[index]].time;
            }
        }

        setInterval(timeOut, 1000);
    </script>
    @endpush
</div>