<template>
    <div>
       

       

       
    
  </div>
</template>

<script>
export default {
    mounted() {
        this.getPetTips();
        this.getPosts();
        this.getUsers();
        this.getPets();
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
            });
        },
        createPosts() {
            axios.post('api/post/create').then(response => {
                this.pets = response.data;
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
