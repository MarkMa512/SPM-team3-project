<?php 
    require_once "../../Class/autoload.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Course Run</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(function(){
          $('#nav').load("./common/navbarTrainer.php");
          console.log("click");
        });
    </script>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</head>
<body>

    <div id="nav"></div>

    <!-- picture can edit -->
    <br>
     <div class="container" id="app">
        <div class="row mapD">
            <h6 class="border-bottom border-gray pb-2 mb-0">List of Course Run</h6>
        </div>
        <br>
        
        <div id="datatable">
            <!-- example -->
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">Course ID</th>
                      <th scope="col">Course Run ID</th>
                      <th scope="col">Course Name</th>
                      <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $courseRunDAO = new CourseRunDAO();
                        $courses = $courseRunDAO->getCourseRun($_GET["coursecode"]);
                        $courseDao = new CourseDAO();
                        
                        foreach ($courses as $info){
                            $name = $courseDao->getCourseByID($info->getCourseCode())->getCourseName();
                            $result[] = [
                                "courseCode"=>$info->getCourseCode(),
                                "courseRunID"=>$info->getCourseRunID(),
                                "startDate"=>$info->getStartDate(),
                                "endDate"=>$info->getEndDate(),
                                "courseName"=> $name
                            ];
                        }
                        foreach($result as $info){
                            echo "<tr>
                                <th scope='col'>{$info['courseCode']}</th>
                                <th scope='col'>{$info['courseRunID']}</th>
                                <th scope='col'>{$info['courseName']}</th>
                                <td><a class='btn btn-outline-primary btn-primary' href='CreateSection.php?courseCode={$info['courseCode']}&courseRunID={$info['courseRunID']}' role='button'>Create Section</a></td>

                            </tr>
                            ";
                        }
                    ?>
                     <!-- <tr>
                      <th scope="row">PT101</th>
                      <td>1</td>
                      <td>Intro to Ink Printers</td>
                      <td><a class="btn btn-outline-primary btn-primary" href="CreateSection.html" role="button">Create Section</a></td>
                    </tr> -->
                    
                  </tbody>
            </table>

        </div>
        
    </div>


    <!-- <script>
      const app = Vue.createApp({
        data() {
            return {
                posts: [] // array of post objects
            }
        },
        created() { // created is a hook that executes as soon as Vue instance is created
            axios.get('http://localhost/spM-team3-project/View/Trainer/getData/getListOfCourseRunData.php')
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
            props:['cid', 'cname', "crid", "qlink", "mlink", "vlink"],
            template:`
                <tr>
                      <th scope="row">PT101</th>
                      <td>1</td>
                      <td>Intro to Ink Printers</td>
                      <td><a class="btn btn-outline-primary btn-primary" href="CreateSection.html" role="button">Create Section</a></td>
                    </tr>
            `
          });
        app.mount('#app');
    </script> -->
</body>

</html>
