<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Sections</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        $(function(){
          $('#nav').load("./common/navbarLearner.php");
          console.log("click");
        });
    </script>

      <style>
          .footer-basic {
        position: absolute;
        bottom: 0;
        width: 100%;
        padding:40px 0;
        background-color:#ffffff;
        color:#4b4c4d;
        }


        .footer-basic .copyright {
         margin-top:15px;
         text-align:center;
         font-size:13px;
         color:#aaa;
         margin-bottom:0;
        }
  </style>

</head>
<body>

    <div id="nav"></div>

    <!-- picture can edit -->
    <br>
    <div class="container" id="app">
      <!-- {{ posts }} -->
       <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Section</h6>
        <list-item v-for="data in posts" v-bind:cid="data.courseCode" v-bind:crid="data.courseRunID"
        v-bind:sname="data.sectionName" v-bind:sid="data.sectionID" 
        v-bind:link="'TakeQuiz.html?coursecode='+data.courseCode+'&courserunid='+data.courseRunID+'&sectionID='+data.sectionID"></list-item>
        <!-- <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <strong class="text-gray-dark"></strong>
              <a href="TakeQuiz.html">Quiz</a>
            </div>
            <span class="d-block">Section 1</span>
          </div>
        </div>  -->
        <!-- <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <strong class="text-gray-dark"></strong>
              <a href="TakeQuiz.html">Quiz</a>
            </div>
            <span class="d-block">Section 2</span>
          </div>
        </div>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <strong class="text-gray-dark"></strong>
              <a href="TakeQuiz.html">Quiz</a>
            </div>
            <span class="d-block">Section 3</span>
          </div>
        </div> -->
        <!--
          <small class="d-block text-right mt-3">
          <a href="#">All Class</a>
        </small>
        -->
      </div>
    </div>

<script>
  const app = Vue.createApp({
        data() {
            return {
                posts: [] // array of post objects
            }
        },
        created() { // created is a hook that executes as soon as Vue instance is created
            axios.get('./getData/getViewSection.php')
            .then(response => {
                // this gets the data, which is an array
                this.posts = response.data;
                console.log(response.data);
            })
            .catch(error => {
                this.posts = [{ entry: 'There was an error: ' + error.message }]
                })
                
            }
            
        });
        app.component('list-item', {
            props:['cid', 'sname', 'sid', 'crid','link'],
            template:`
            <div class="media text-muted pt-3">
              <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
              <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                  <strong class="text-gray-dark">{{ sname }}</strong>
                  <a :href="link">Quiz</a>
                </div>
                <span class="d-block">Section {{ sid }}</span>
              </div>
            </div>
            `
          });
        app.mount('#app');
</script>


</body>

</html>
