<div>

    <section class="page page-center" style="background-color: #eee;">
        <div class="container">

            <div class="row d-flex justify-content-center ">
                <div class="col-md-10 col-lg-8 col-xl-6 ">

                    <form wire:submit.prevent="submit">
                        <div class="card " id="chat2">
                            <div class="card-header d-flex justify-content-between align-items-center p-3" id="navbar-example3">
                                <h5 class="mb-0">Chat</h5>

                            </div>
                            <div class="card-body overflow-auto" style="position: relative; height: 500px;">

                                @if(!empty($list_user))
                                @foreach ($list_user as $k => $v)
                                <div class="d-flex flex-row justify-content-start my-1">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                                    <div>
                                        <p class="py-2">{{$v['name']}}</p>
                                    </div>
                                    <div>
                                        <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">{{$v['content']}}</p>
                                    </div>
                                </div>

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
         * get data 
         */
        const database = firebase.database();

        var user;
        var check = 0;
        var dbRef = firebase.database().ref();


        // realtime
        var starCountRef = firebase.database().ref('users/');
        var listener = starCountRef.on('value', (snapshot) => {
            user = snapshot.val();
            @this.set("list_user", user);

        });

        // check connect
        var connectedRef = firebase.database().ref(".info/connected");
        connectedRef.on("value", (snap) => {
            if (snap.val() === true) {
                console.log("connected");
            } else {
                check++;
                console.log("not connected");
                // if (check > 1) {
                //     starCountRef.off('value');
                // }

            }
        });

        var presenceRef = firebase.database().ref("disconnectmessage");
        // Write a string when this client loses connection
        presenceRef.onDisconnect().set("I disconnected!");
    </script>
    @endpush
</div>