<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(function(){
          $('#nav').load("./common/navbarTrainer.php");
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
  <script src="https://unpkg.com/vue@next"></script>  
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>

    <div id="nav"></div>
    <input type="hidden" id="ccode" value="<?php echo $_GET["coursecode"]?>" >
    <input type="hidden" id="crid" value="<?php echo $_GET["courserunid"]?>">
    <!-- picture can edit -->
    <br>
     <div class="container">
        <div class="row mapD">
            <h6 class="border-bottom border-gray pb-2 mb-0">Manage Materials</h6>
        </div>
        <br>
        
        <div id="app">
            <!-- example -->
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">Course Name</th>
                      <th scope="col">Section</th>
                      <th scope="col">Material</th>
                      <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <list-item v-for="data in posts" v-bind:cid="data.CourseCode" v-bind:crid="data.CourseRunID" v-bind:material="data.Material" v-bind:mid="data.MaterialID" v-bind:name="data.Name" v-bind:sid="data.SectionID" v-bind:link="'./postData/deleteMaterials.php?cid='+data.CourseCode+'&crid='+data.CourseRunID+'&sid='+data.SectionID+'&mid='+data.MaterialID"></list-item>

                    <tr>
                      <th scope="row">IS112-S1</th>
                      <td scope="row">Begin Your Service Journey</td>
                      <td scope="row">2</td>
                      <td><button class="btn btn-outline-primary align">Delete</button></td>
                    </tr>
                  </tbody>
            </table>

            <a class="btn btn-outline-primary btn-primary" href="CreateCourse.html" role="button">Upload New Material</a>
            
        </div>
        
    </div>


        <div class="footer-basic">
        <footer>
          
            <p class="copyright">LMS - Group 3 © 2021</p>
        </footer>
    </div>


</body>
<script>
  const app = Vue.createApp({
    data() {
        return {
            posts: [] // array of post objects
        }
    },
    created() { // created is a hook that executes as soon as Vue instance is created
        axios.get('http://localhost/SPM-team3-project/View/Trainer/getData/getManageMaterialData.php',{
          params: {
            "coursecode": document.getElementById("ccode").value,
            "crid": document.getElementById("crid").value
          }
        })
        .then(response => {
            // this gets the data, which is an array
            this.posts = response.data
            console.log(response.data);
        })
        .catch(error => {
            this.posts = [{ entry: 'There was an error: ' + error.message }]
        })
        
      }
    
    });
    app.component('list-item', {
        props:['cid', 'crid','material','mid','name','sid','link'],
        template:`
                  <tr>
                      <th scope="row">{{ cid }}-{{ crid }}</th>
                      <td scope="row">{{ sid }}</td>
                      <td scope="row"> {{ mid }}-{{ name }}</td>
                      <td><a :href="link"><button class="btn btn-outline-primary align">Delete</button></a></td>
                    </tr>
        `
      });
app.mount('#app');
</script>
</html>