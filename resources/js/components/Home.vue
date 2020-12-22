<template>
    <div>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div style="margin-left: 40px; margin-right: 40px; margin-top: 10px; margin-bottom: 50px;">
                <h2>Create post </h2>
                
                <form enctype="multipart/form-data" action="/welcome" class="text-left" id="upload">
                   
                    <div class="form-group">
                        <label for="title">question</label>
                        <input type="text" v-model="title" class="form-control" id="title" name="title" oninvalid="this.setCustomValidity('Please enter your question')" oninput="setCustomValidity('')" required>
                       
                    </div>
                    <div class="form-group">
                        <label for="detail">detail</label>
                        <textarea class="form-control " v-model="detail" id="detail" rows="3" name="detail" oninvalid="this.setCustomValidity('Please enter detail')" oninput="setCustomValidity('')" required></textarea>
                      
                    </div>
                    <div class="form-group">
                        <label for="img">More detail ( can choose more than 2 pictures )</label>
                        <input multiple type="file" id="image" name="image[]" class="form-control " />
                        <div id="previewImg" style="margin-top: 30px;"></div>
                    </div>
                    <div class="form-group">
                        <label for="choosePet">Choose your pet</label>
                       
                        <div v-if="pets.length==0" class="row">
                            <div class="col-10">
                                <select disabled class="form-control">
                                    <option value="">.</option>
                                </select>

                            </div>
                            <a href="" class="btn btn-info col-2" style="background-color: #EB984E; color: white">create pet</a>
                            <small style="font-size: 13px; color: #E74C3C"><i class="fas fa-exclamation-circle" style="margin-right: 3px"></i>Create your pet
                            first</small>
                        </div>
                       
                        <div v-else>
                            <select id="choosePet" class="form-control " name="choosePet" required>
                            <option v-for="pet in pets" value="pet.id">{{pet.name}}</option>
                            </select>
                        </div> 
                       
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" v-on:click="createPosts()" class="btn btn-primary">Post</button>
                    </div>

                </form>
            </div>
        </div>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" style="height: 380px;background-color: #192730;">
                <div class="carousel-item active" style="height: 380px;">
                    <img class="d-block w-100" src="/images/petTipsBg1.png" style="max-height: 500px" alt="First slide">
                </div>
                <div v-for="tip in petTips" class="carousel-item ">
                    <div v-if="tip.img_path == null">
                    <div class="container" style=" padding-top:3.5em; color: white; ">
                        <div>
                            <h3 style="text-align: center;margin-top: 3.6em ;font-weight: bold;font-size: 26px">{{tip.title}}</h3>
                        </div>
                        <div>
                            <h4 style="text-align: center;margin-top: 1em ;">{{tip.detail}}</h4>
                        </div>
                    </div>
                    </div>
                    <div v-else>
                    <img class="d-block w-100" src="public/tips/banner1.jpg" alt="" style="max-height: 500px" srcset="">
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
        </div>
        <button type="button"v-on:click="createPosts()" class="btn btn-warning btn-lg btn-block" style="cursor:pointer; margin-top: 20px" onclick="openNav()">
        Create question
        </button>

        <div class="" style="margin: 50px">
    
            <div v-for="post in posts" class="card post-card border-light abc" style="margin-top: 10px">
                <a href="" style="text-decoration: none; color: #1b1e21">
                    <div class="card-body">
                        <p class="card-text"></p>
                        <div class="row">
                            <p style="font-size: 25px" class="col-8"><i class="fas fa-paw" style="margin-right: 13px"></i>{{ post.question }}
                            </p>
                            <p class="text-muted text-right col-4" style="font-size: 15px">
                                <span v-for="user in users">
                                    <span v-if="user.id == post.user_id">
                                        <i class="fas fa-user" style="margin-right: 6px"></i>
                                        {{ user.name }}

                                    </span>
                                </span>
                                <span v-for="pet in pets">
                                    <span v-if="pet.id == post.pet_id">
                                        <i class="fas fa-dog" style="margin-right: 3px; margin-left: 10px"></i>
                                        {{ pet.name }}
                                    </span>
                                </span>
                               
                            </p>
                        </div>
                        <p style="font-size: 18px">{{ post.detail }}</p>
                    </div>
                </a>
            </div>
            <p class="totop" style="text-align: center; padding-top: 25px">
                <a href="#top"><i class="fa fa-chevron-circle-up" style="font-size:60px"></i></a>
            </p>
        </div>
 
    
  </div>
</template>

<script>
export default {
    mounted() {
        this.getPetTips();
        this.getPosts();
        this.getUsers();
        this.getPets();
        this.createPost();
    },
    methods: {
        getPetTips() {
            axios.get('api/petTips').then(response => {
                this.petTips = response.data;
            });
        },
        getPosts() {
            axios.get('api/posts').then(response => {
                this.posts = response.data;
            });
        },
        getUsers() {
            axios.get('api/users').then(response => {
                this.users = response.data;
            });
        },
        getPets() {
            axios.get('api/pets').then(response => {
                this.pets = response.data;
                console.log(response.data);
            });
        },
        createPosts() {
            axios.post('api/post/create').then(response => {
                
            });
        }
    },
    data(){
        return {
            petTips:[],posts:[],users:[],pets:[],
            tip: {
                id: 0,
                title: '',
                detail: '',
                img_path: ''
            },
            post: {
                id: 0,
                question: '',
                detail: '',
                user_id: 0,
                pet_id: 0
            },
            user: {
                id: 0,
                name:''
            },
            pet:{
                id: 0,
                name:''
            },
            title :'',
            detail:''

        }
    }
}
</script>
