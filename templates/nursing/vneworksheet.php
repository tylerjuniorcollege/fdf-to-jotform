<?php
function selectGrade($input_name, $input_id, $modifier, $val) {
  $grade_opt = array();
  foreach(array('A', 'B', 'C', 'D', 'F') as $grade) {
    $grade_opt[] = sprintf('<option value="%s"%s>%s</option>', $grade, ($val == $grade ? ' selected="selected"' : ''), $grade);
  }
  return sprintf('<select id="%s_grade" name="%s" class="form-control grade grade-%s"><option value=""></option>%s</select>', $input_id, $input_name, $modifier, implode($grade_opt));
}

$answers = array();

if(isset($data['answers'])) {
  $answers = $data['answers'];
}

?>
    <ol class="breadcrumb">
        <li><a href="http://www.tjc.edu">Home</a></li>
        <li><a href="http://www.tjc.edu/info/20000/academics">Academics</a></li>
        <li><a href="http://www.tjc.edu/info/2004131/nursing_and_health_sciences">Nursing and Health Sciences</a></li>
        <li><a href="http://www.tjc.edu/info/2004131/nursing_and_health_sciences/104/nursing_vocational_vne">Nursing, Vocational (VNE)</a></li>
        <li class="active">Admission Worksheet</li>
    </ol>
    <?php if(!isset($data['framed'])): ?>
    <div class="row page-header">
        <h3>Nursing, Vocational (VNE) Admission Worksheet</h3>
    </div>
    <?php endif; ?>
    <form class="form-horizontal" action="https://submit.jotformpro.com/submit/52604460246955/" method="post" name="form_52604460246955">
        <input type="hidden" name="formID" value="52604460246955">
<?php if(isset($data['id'])): ?>
        <input type="hidden" name="editSubmission" value="<?=$data['id']?>">
<?php endif; ?>
        <div class="form-group">
            <label for="input_3" class="col-sm-2 control-label">Applicant Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="q1_fullName1[first]" placeholder="First Name" value="<?= (isset($answers[1]['answer']['first']) ? $answers[1]['answer']['first'] : '' )?>" aria-describedby="firstName">
                <span class="help-block" id="firstName">First Name</span>
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="q1_fullName1[last]" placeholder="Last Name" value="<?= (isset($answers[1]['answer']['last']) ? $answers[1]['answer']['last'] : '' )?>" aria-describedby="lastName">
                <span class="help-block" id="lastName">Last Name</span>
            </div>
        </div>
        <div class="form-group">
            <label for="input_4" class="col-sm-2 control-label">TJC Email Address</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="q3_tjcEmail" placeholder="ex: student@tjc.edu" value="<?= (isset($answers[3]['answer']) ? $answers[3]['answer'] : '' )?>">
            </div>
            <label class="col-sm-1 control-label">TJC A#</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="q4_tjcA" placeholder="A########" value="<?= (isset($answers[4]['answer']) ? $answers[4]['answer'] : '' )?>">
            </div>
        </div>
        <div class="row page-header">
            <h4>Follow the instructions below to calculate your admission points:</h4>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Grade Point Average</label>
            <div class="col-sm-3">
                <input type="text" name="q5_gpa" class="form-control" placeholder="Ex. 3.5" id="gpa" value="<?= (isset($answers[5]['answer']) ? $answers[5]['answer'] : '' )?>">
            </div>
            <div class="col-md-2 col-md-offset-5">
                Points: <input type="text" class="form-control points" id="gpa_points" value="0" readonly>
            </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Addtional GPA Points</label>
          <div class="col-md-2 col-md-offset-8">
            Addtional Points: <input type="text" class="form-control points" id="gpa_additional_points" value="0" readonly>
          </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">HESI A2 Version 1 Testing</h3>
            </div>
        </div>
        <div class="form-group">
          <div class="col-md-7">
            <div class="form-group">
              <label for="hesi_reading_score" class="col-sm-6 control-label">HESI Reading Score</label>
              <div class="col-sm-6 input-group">
                <input type="text" name="q6_hesiReading" class="hesi_score form-control" id="hesiReading" value="<?= (isset($answers[6]['answer']) ? $answers[6]['answer'] : ''); ?>">
                <span class="input-group-addon">%</span>
              </div>
            </div>
            <div class="form-group">
              <label for="hesi_math_score" class="col-sm-6 control-label">HESI Math Score</label>
              <div class="col-sm-6 input-group">
                <input type="text" name="q7_hesiMath" class="hesi_score form-control" id="hesiMath" value="<?= (isset($answers[7]['answer']) ? $answers[7]['answer'] : ''); ?>">
                <span class="input-group-addon">%</span>
              </div>
            </div>
            <div class="form-group">
              <label for="hesi_anatomy_score" class="col-sm-6 control-label">HESI A &amp; P Score</label>
              <div class="col-sm-6 input-group">
                <input type="text" name="q8_hesiA" class="hesi_score form-control" id="hesiAP" value="<?= (isset($answers[8]['answer']) ? $answers[8]['answer'] : ''); ?>">
                <span class="input-group-addon">%</span>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label class="col-sm-6 control-label">HESI Reading Points</label>
              <div class="col-sm-6">
                <input type="text" id="hesiReadingScore" class="form-control hesi_points" value="0" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-6 control-label">HESI Math Points</label>
              <div class="col-sm-6">
                <input type="text" id="hesiMathScore" class="form-control hesi_points" value="0" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-6 control-label">HESI A &amp; P Points</label>
              <div class="col-sm-6">
                <input type="text" id="hesiAPScore" class="form-control hesi_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10 col-sm-offset-2">
            <div class="col-sm-2 col-sm-offset-10">
              Points: <input type="text" class="form-control points" id="hesiTotal_points" value="0" readonly>
            </div>
          </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Biology 2401, 2402, 2404 Course Grades</h3>
            </div>
        </div>
        <div class="form-group">
          <label for="input_10" class="col-sm-2 control-label">BIOL 2404</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-md-2">
                Grade: <?= selectGrade('q25_biol2404', 'biol2404', 4, (isset($answers[25]['answer']) ? $answers[25]['answer'] : '')); ?>
              </div>
              <div class="col-md-2 col-md-offset-8">
                Points: <input type="text" class="form-control points" id="biol2404_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="input_10" class="col-sm-2 control-label">BIOL 2401</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-md-2">
                Grade: <?= selectGrade('q12_biol2401', 'biol2401', 4, (isset($answers[12]['answer']) ? $answers[12]['answer'] : '')); ?>
              </div>
              <div class="col-md-2 col-md-offset-8">
                Points: <input type="text" class="form-control points" id="biol2401_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="input_10" class="col-sm-2 control-label">BIOL 2402</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-md-2">
                Grade: <?= selectGrade('q14_biol2402', 'biol2402', 4, (isset($answers[14]['answer']) ? $answers[14]['answer'] : '')); ?>
              </div>
              <div class="col-md-2 col-md-offset-8">
                Points: <input type="text" class="form-control points" id="biol2402_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Extra Points</h3>
            </div>
        </div>
        <div class="form-group">
          <label for="input_10" class="col-sm-2 control-label">HITT 1305</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-md-2">
                Grade: <?= selectGrade('q18_hitt1305', 'hitt1305', 1, (isset($answers[18]['answer']) ? $answers[18]['answer'] : '')); ?>
              </div>
              <div class="col-md-2 col-md-offset-8">
                Points: <input type="text" class="form-control points" id="hitt1305_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="input_10" class="col-sm-2 control-label">HITT 1303</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-md-2">
                Grade: <?= selectGrade('q19_hitt1303', 'hitt1303', 1, (isset($answers[19]['answer']) ? $answers[19]['answer'] : '')); ?>
              </div>
              <div class="col-md-2 col-md-offset-8">
                Points: <input type="text" class="form-control points" id="hitt1303_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="input_10" class="col-sm-2 control-label">BIOL 2420</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-md-2">
                Grade: <?= selectGrade('q16_biol2420', 'biol2420', 4, (isset($answers[16]['answer']) ? $answers[16]['answer'] : '')); ?>
              </div>
              <div class="col-md-2 col-md-offset-8">
                Points: <input type="text" class="form-control points" id="biol2420_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Certificate or Licensure and Work Experience</h3>
            </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"></label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-10">
                <div class="checkbox">
                  <input type="hidden" name="q21_currentCertificate" value="No">
                  <label>
                    <input type="checkbox" class="addReq points-4" name="q21_currentCertificate" id="cna" value="Yes"<?=(isset($answers[21]['answer']) && $answers[21]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Current Certificate - Certified Nursing Assistant *
                  </label>
                  <p class="help-block">* Must show documented 6 months experience in the last 12 months prior to posted application period.</p>
                </div>
              </div>
              <div class="col-sm-2">
              Points: <input type="text" class="form-control points" id="cna_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">In District Residency</h3>
            </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"></label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-10">
                <div class="checkbox">
                  <input type="hidden" name="q24_anyStudent" value="No">
                  <label>
                    <input type="checkbox" class="addReq points-3" name="q24_anyStudent" id="residency" value="Yes"<?=(isset($answers[24]['answer']) && $answers[24]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Any student that is classified as TJC in district
                  </label>
                </div>
              </div>
              <div class="col-sm-2">
              Points: <input type="text" class="form-control points" id="residency_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-offset-8">Total Points:</label>
          <div class="col-sm-2">
            <div class="form-group">
              <div class="col-sm-12">
                <input type="text" id="total_points" class="form-control" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2 col-sm-offset-5">
            <button class="btn btn-primary" type="submit">Submit Form</button>
          </div>
        </div>
        <input type="hidden" id="simple_spc" name="simple_spc" value="52604460246955" />
        <script type="text/javascript">
          document.getElementById("si" + "mple" + "_spc").value = "52604460246955-52604460246955";
        </script>
      </form>
      <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        var totalPoints = function() {
          var points = 0;
          $('.points').each(function() {
            points += parseFloat($(this).val());
          });
          $('#total_points').val(points);
        };

        var calcAddReq = function(id) {
            var pointEle = $(id).attr("id") + "_points";
            var addPoints = parseInt($(id).attr("class").substr(-1, 1));
            var pointTotal = 0;

            if($(id).is(":not(:checked)") && $('#' + pointEle).hasClass("completedAddReq")) {
              $('#' + pointEle).removeClass("completedAddReq");
            } else if($(id).is(":checked")) {
              pointTotal = pointTotal + addPoints;
              $('#' + pointEle).addClass("completedAddReq");
            }

            // Update points.
            $('#' + pointEle).val(pointTotal);

            totalPoints(); // Recalc totalPoints.
        };

        var calcRmReq = function(id) {
            var pointEle = $(id).attr("id").replace("_not","_points");
            var pointTotal = 0;
            $('#' + pointEle).removeClass("completedAddReq");

            // Update points.
            $('#' + pointEle).val(pointTotal);

            totalPoints();
        };

        var calcGpa = function() {
            var gpa = parseFloat(parseFloat($('#gpa').val()).toFixed(2));

            var points = gpa * 4;
            var add_points = 0;
            if(gpa > 3.50) {
              add_points += 3;
            } else if(gpa >= 3.10 && gpa <= 3.50) {
              add_points += 2;
            } else if(gpa >= 2.3 && gpa <= 3.10) {
              add_points += 1;
            }

            $('#gpa_points').val(points);
            
            $('#gpa_additional_points').val(add_points);

            totalPoints();
        };

        var calcHesi = function() {
            $('.hesi_score').each(function() {
                var score = parseFloat($(this).val());
                var pointsEle = "#" + $(this).attr("id") + "Score";
                var pointTotal = 0;

                if($.isNumeric(score)) {
                    if(score >= 91 && score <= 100) {
                      pointTotal = 6;
                    } else if (score >= 81 && score <= 90) {
                      pointTotal = 4;
                    } else if (score >= 71 && score <= 80) {
                      pointTotal = 2;
                    }
                }

                $(pointsEle).val(pointTotal);
            });

            var totals = 0;
            $('.hesi_points').each(function() {
                totals += parseFloat($(this).val());
            });

            $('#hesiTotal_points').val(totals);

            totalPoints();
        };

        var calcBioGrade = function(id) {
            var pointEle = $(id).attr("id").replace("_grade", "_points");
            var pointTotal = 0; //parseFloat($('#' + pointEle).val()); - We need to reset this to calculate properly.
            var grade = $(id).val();
            var modifier = $(id).attr("class").substr(-1, 1);

            var gp = 0;
            switch(grade) {
              case "A":
                gp = 6;
                break;
              case "B":
                gp = 4;
                break;
              case "C":
                gp = 2;
                break;
              default:
                gp = 0;
                break;
            }

            pointTotal = pointTotal + gp;

            $('#' + pointEle).val(pointTotal);

            totalPoints();
        };

        var calcBonusGrade = function(id) {
            var pointEle = $(id).attr("id").replace("_grade", "_points");
            var pointTotal = 0; //parseFloat($('#' + pointEle).val()); - We need to reset this to calculate properly.
            var grade = $(id).val();
            var modifier = $(id).attr("class").substr(-1, 1);

            var gp = 0;
            switch(grade) {
              case "A":
                gp = 3;
                break;
              case "B":
                gp = 2;
                break;
              case "C":
                gp = 1;
              default:
                gp = 0;
                break;
            }

            pointTotal = pointTotal + gp;

            $('#' + pointEle).val(pointTotal);

            totalPoints();
        };

        $(document).ready(function() {
            $('body').on('change', '#gpa', calcGpa);
            $('body').on('change', '.hesi_score', calcHesi);
            $('body').on('change', '.addReq', function() {
                calcAddReq($(this));
            });
            $('body').on('change', '.rmReq', function() {
                calcRmReq($(this));
            });

            $('body').on('change load', '.grade-4', function(){ 
                calcBioGrade($(this)); 
            });

            $('body').on('change load', '.grade-1', function(){ 
                calcBonusGrade($(this)); 
            });            

            calcGpa();
            calcHesi();
            $('.grade-4').each(function() {
                calcBioGrade($(this));
            });
            $('.grade-1').each(function() {
                calcBonusGrade($(this));
            });
            $('.addReq').each(function() {
                calcAddReq($(this));
            });

            totalPoints();
        });
    </script>