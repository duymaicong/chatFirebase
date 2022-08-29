<div>
    <section class="page page-center" style="background-color: #eee;">
        <div class="container">


            <div class="row d-flex justify-content-center ">
                <div class="col-md-10 col-lg-8 col-xl-6 ">
                    <form>
                        <div class="card " id="chat2">
                            <div class="card-header d-flex justify-content-between align-items-center p-3" id="navbar-example3">
                                <h5 class="mb-0">Admin</h5>
                            </div>
                            <div class="card-body overflow-auto" style="position: relative; height: 220px;">
                                <?php $count = 0;
                                ?>
                                <button type="button" class="btn btn-block btn-primary" wire:click="prev">Prev</button>
                                @if($list_quest)
                                @foreach ($list_quest as $k => $v)
                                <button type="button" class="btn btn-block btn-primary" wire:click="updateIndex({{ $count }})">{{$count+1}}</button>
                                <?php $count++ ?>
                                @endforeach
                                @endif
                                <button type="button" class="btn btn-block btn-primary" wire:click="next">Next</button>
                            </div>
                            <div class="border-bottom">
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <h6>Connection</h6>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <h6>Disconnection</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body overflow-auto " style="position: relative; height: 350px;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            @if($listConnect)
                                            @foreach ($listConnect as $k => $v)
                                            <div class="col-md-6">
                                                <div class="articles card my-1">
                                                    <div class="card-close">
                                                        <div class="dropdown">
                                                            <div class="card-body no-padding bg-lime">
                                                                <div class="item d-flex align-items-center ">
                                                                    <div class="text ">
                                                                        <h3 class="h5 text-white">{{$v['name']}}</h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="row">
                                            @if($listDisconnect)
                                            @foreach ($listDisconnect as $k => $v)
                                            <div class="col-md-6">
                                                <div class="articles card my-1">
                                                    <div class="card-close">
                                                        <div class="dropdown">
                                                            <div class="card-body no-padding bg-purple">
                                                                <div class="item d-flex align-items-center ">
                                                                    <div class="text ">
                                                                        <h3 class="h5 text-white">{{$v['name']}}</h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 3" style="width: 40px; height: 100%;">
                                <input type="text" class="form-control form-control-lg" id="exampleFormControlInput1" wire:model.defer="content">
                                <button type="submit" class="btn btn-primary">

                                    Gửi
                                </button>
                            </div> -->
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

        var quest, key, index;
        var check = 0;

        var listUserConnectCountRef = firebase.database().ref('connection/list-quest/');
        listUserConnectCountRef.on('value', (snapshot) => {
            index = snapshot.val();
            console.log(index);
            @this.set("listConnect", index);

        });
        var listUserDisconnectCountRef = firebase.database().ref('disconnection/list-quest/');
        listUserDisconnectCountRef.on('value', (snapshot) => {
            index = snapshot.val();
            console.log(index);
            @this.set("listDisconnect", index);

        });

        // list quest
        var questCountRef = firebase.database().ref('question/');
        var listener = questCountRef.on('value', (snapshot) => {
            quest = snapshot.val();
            console.log(quest);
            @this.set("list_quest", quest);

        });
    </script>
    @endpush
</div>