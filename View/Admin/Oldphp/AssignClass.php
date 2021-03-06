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
          $('#nav').load("./common/navbarAdmin.php");
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
    <!-- picture can edit -->
    <br>
    </div>
    <div id="app" class="container">
        <div class="my-3 p-3 bg-white rounded box-shadow">
            <h6 class="border-bottom border-gray pb-2 mb-0">List of Employees</h6>
            <list-item v-for="d in posts" v-bind:id="d.EmpID" v-bind:name="d.Name" v-bind:link="'AssignTo.php?empID='+d.EmpID">{{ d.EmpID }} {{ d.Name }}</list-item>
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
                axios.get('http://localhost/SPM-team3-project/View/Admin/getAssignClassData.php')
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
            props:['id', 'name','link'],
            template:`
                <div>
                  <div class="media text-muted pt-3">
                  <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                  <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <div class="d-flex justify-content-between align-items-center w-100">
                      <strong class="text-gray-dark">{{ id }}</strong>
                      <a :href="link">Assign</a>
                    </div>
                    <span class="d-block">{{ name }}</span>
                  </div>
                </div>
                </div>
            `
          });
        app.mount('#app');
    </script>
</body>
</html>