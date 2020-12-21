<template>
    <div>
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

        <div class="" style="margin: 50px">
    
            <div v-for="post in posts" class="card post-card border-light abc" style="margin-top: 10px">
                <a href="" style="text-decoration: none; color: #1b1e21">
                    <div class="card-body">
                        <p class="card-text"></p>
                        <div class="row">
                            <p style="font-size: 25px" class="col-8"><i class="fas fa-paw" style="margin-right: 13px"></i>{{ post.question }}
                            </p>
                            <!-- <p class="text-muted text-right col-4" style="font-size: 15px">
                                <i class="fas fa-user" style="margin-right: 6px"></i>
                                {{ post.user.name }}
                                <i class="fas fa-dog" style="margin-right: 3px; margin-left: 10px"></i>
                                {{ post.pet.name }}
                            </p> -->
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
        }
    },
    data(){
        return {
            petTips: [],posts:[],
            tip: {
                id: 0,
                title: '',
                detail: '',
                img_path: ''
            },
            post: {
                id: 0,
                question: '',
                detail: ''
            }
        }
    }
}
</script>
