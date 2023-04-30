<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>


    <div class="container">

      <form method="post" action="<?= base_url('sitecontroller/permission'); ?>">
      <table>
        <thead>
          <tr>
            <th>Feature</th>
            <th>
                <div class="form-group"> 
                  <label class="i-checks"><input type="checkbox" class="form-check-input" id="all_view" value="1"><i></i>view</label> 
                </div>
            </th>
            <th>
                <div class="form-group"> 
                  <label class=""><input type="checkbox" class="form-check-input" id="all_add" value="1"><i></i>Add</label> 
                </div>
            </th>
            <th>
                <div class="form-group"> 
                  <label class=""><input type="checkbox" class="form-check-input" id="all_edit" value="1"><i></i>Edit</label> 
                </div>
            </th>
            <th>
                <div class="form-group"> 
                  <label class=""><input type="checkbox" class="form-check-input" id="all_delete" value="1"><i></i>Delete</label> 
                </div>
            </th>
          </tr>
        </thead>

        <tbody>
          

          <tr>
              <!-- <th colspan="5"><?php //echo $module['id']; ?></th> -->
              <th colspan="5">Dashboard</th>
          </tr>


          <tr>
            <td>Admission Count Widget</td>
            <td>
                <div class="checkbox-replace"> 
                  <label class="i-checks"><input type="checkbox" class="cb_view" name="privileges[0][view]" value="1" >
                    <i></i>
                  </label>
                </div>
            </td>
            <td>
                <div class="checkbox-replace"> 
                  <label class="i-checks"><input type="checkbox" class="cb_view" name="privileges[0][add]" value="1" >
                    <i></i>
                  </label>
                </div>
            </td>
            <td>
                <div class="checkbox-replace"> 
                  <label class="i-checks"><input type="checkbox" class="cb_view" name="privileges[0][edit]" value="1" >
                    <i></i>
                  </label>
                </div>
            </td>
            <td>
                <div class="checkbox-replace"> 
                  <label class="i-checks"><input type="checkbox" class="cb_view" name="privileges[0][delete]" value="1" >
                    <i></i>
                  </label>
                </div>
            </td>
          </tr>
          <tr>
            <td>Parent Count Widget</td>
            <td>
                <div class="checkbox-replace"> 
                  <label class="i-checks"><input type="checkbox" class="cb_view" name="privileges[1][view]" value="1" >
                    <i></i>
                  </label>
                </div>
            </td>
            <td>
                <div class="checkbox-replace"> 
                  <label class="i-checks"><input type="checkbox" class="cb_view" name="privileges[1][add]" value="1" >
                    <i></i>
                  </label>
                </div>
            </td>
            <td>
                <div class="checkbox-replace"> 
                  <label class="i-checks"><input type="checkbox" class="cb_view" name="privileges[1][edit]" value="1" >
                    <i></i>
                  </label>
                </div>
            </td>
            <td>
                <div class="checkbox-replace"> 
                  <label class="i-checks"><input type="checkbox" class="cb_view" name="privileges[1][delete]" value="1" >
                    <i></i>
                  </label>
                </div>
            </td>
          </tr>
          <tr>
            <td>Student Count Widget</td>
            <td>
                <div class="checkbox-replace"> 
                  <label class="i-checks"><input type="checkbox" class="cb_view" name="privileges[2][view]" value="1" >
                    <i></i>
                  </label>
                </div>
            </td>
            <td>
                <div class="checkbox-replace"> 
                  <label class="i-checks"><input type="checkbox" class="cb_view" name="privileges[2][add]" value="1" >
                    <i></i>
                  </label>
                </div>
            </td>
            <td>
                <div class="checkbox-replace"> 
                  <label class="i-checks"><input type="checkbox" class="cb_view" name="privileges[2][edit]" value="1" >
                    <i></i>
                  </label>
                </div>
            </td>
            <td>
                <div class="checkbox-replace"> 
                  <label class="i-checks"><input type="checkbox" class="cb_view" name="privileges[2][delete]" value="1" >
                    <i></i>
                  </label>
                </div>
            </td>
          </tr>



          <tr>
              <!-- <th colspan="5"><?php //echo $module['id']; ?></th> -->
              <th colspan="5">Student</th>
          </tr>
          <tr>
              <!-- <th colspan="5"><?php //echo $module['id']; ?></th> -->
              <th colspan="5">Parent</th>
          </tr>
          <tr>
              <!-- <th colspan="5"><?php //echo $module['id']; ?></th> -->
              <th colspan="5">Hostel</th>
          </tr>


          
              
              


          



          
            






        </tbody>
        
      </table>

      <div class="row">
        <button type="submit" name="save" value="1" class="btn btn-info btn-block" >Update</button>
      </div>

      </form>
    </div>





















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>