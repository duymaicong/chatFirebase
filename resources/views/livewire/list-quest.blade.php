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
                            <div class="card-body overflow-auto" style="position: relative; height: 500px;">

                                @if(!empty($list_quest))
                                @foreach ($list_quest as $k => $v)

                                @if($k==$list_key[$index])
                                <div class="d-block my-1">

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



        /**
         * get data 
         */
        const database = firebase.database();

        var quest, key, index;
        var check = 0;
        var dbRef = firebase.database().ref();

        /**
         * update client connect
         */


        var newPostKey = database.ref('connection/list-quest').push().getKey();


        database.ref('connection/list-quest/' + newPostKey) // this is the root reference
            .update({
                key: newPostKey,
                name: name_client
            });


        // realtime
        var questCountRef = firebase.database().ref('question/');
        var listener = questCountRef.on('value', (snapshot) => {
            quest = snapshot.val();
            key = Object.keys(quest);
            console.log(quest);
            console.log(key);
            @this.set("list_quest", quest);
            @this.set("list_key", key);

        });

        var indexCountRef = firebase.database().ref('index/');
        indexCountRef.on('value', (snapshot) => {
            index = snapshot.val();
            console.log(index);
            @this.set("index", index);

        });


        var presenceRef = firebase.database().ref("disconnection/list-quest/"+newPostKey);
        var presenceConnectRef = firebase.database().ref('connection/list-quest/' + newPostKey);
        // Write a string when this client loses connection
        presenceRef.onDisconnect().update({
            key: newPostKey,
            name: name_client
        });
        presenceConnectRef.onDisconnect().remove();
    </script>
    @endpush
</div>