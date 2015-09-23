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
        <li><a href="http://www.tjc.edu/info/2004131/nursing_and_health_sciences/836/dental_assisting">Dental Assisting</a></li>
        <li class="active">Admission Worksheet</li>
      </ol>
      <?php if(!isset($data['framed'])): ?>
      <div class="row page-header">
        <h3>Dental Assisting Admission Worksheet</h3>
      </div>
      <?php endif; ?>
      <form class="form-horizontal" action="https://submit.jotformpro.com/submit/52374252783964/" method="post" name="form_52374252783964">
        <input type="hidden" name="formID" value="52374252783964">
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
            <input type="text" class="form-control" name="q4_tjcEmail" placeholder="ex: student@tjc.edu" value="<?= (isset($answers[4]['answer']) ? $answers[4]['answer'] : '' )?>">
          </div>
          <label class="col-sm-1 control-label">TJC A#</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="q3_tjcA" placeholder="A########" value="<?= (isset($answers[3]['answer']) ? $answers[3]['answer'] : '' )?>">
          </div>
        </div>
        <div class="row page-header">
          <h4>Follow the instructions below to calculate your admission points:</h4>
        </div>
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">HESI A2 Version 1 Test, based on the following 4 sections:</h3>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-7">
            <div class="form-group">
              <label for="hesi_reading_score" class="col-sm-6 control-label">HESI Reading Score</label>
              <div class="col-sm-6">
                <input type="text" name="q5_hesiReading" class="hesi_score form-control percent-2" id="hesiReading" value="<?= (isset($answers[5]['answer']) ? $answers[5]['answer'] : ''); ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="hesi_math_score" class="col-sm-6 control-label">HESI Math Score</label>
              <div class="col-sm-6">
                <input type="text" name="q6_hesiMath" class="hesi_score form-control percent-1" id="hesiMath" value="<?= (isset($answers[6]['answer']) ? $answers[6]['answer'] : ''); ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="hesi_vocabulary_score" class="col-sm-6 control-label">HESI Vocabulary Score</label>
              <div class="col-sm-6">
                <input type="text" name="q7_hesiVocabulary" class="hesi_score form-control percent-2" id="hesiVocab" value="<?= (isset($answers[7]['answer']) ? $answers[7]['answer'] : ''); ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="hesi_anatomy_score" class="col-sm-6 control-label">HESI Anatomy Score</label>
              <div class="col-sm-6">
                <input type="text" name="q8_hesiAnatomy" class="hesi_score form-control percent-1" id="hesiAnatomy" value="<?= (isset($answers[8]['answer']) ? $answers[8]['answer'] : ''); ?>">
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
              <label class="col-sm-6 control-label">HESI Vocabulary Points</label>
              <div class="col-sm-6">
                <input type="text" id="hesiVocabScore" class="form-control hesi_points" value="0" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-6 control-label">HESI Anatomy Points</label>
              <div class="col-sm-6">
                <input type="text" id="hesiAnatomyScore" class="form-control hesi_points" value="0" readonly>
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
            <h3 class="panel-title">Tyler Junior College district classification</h3>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"></label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-10">
                Are you classified as an "In-District" student for Tyler Junior College?
                <div class="radio">
                  <label>
                    <input type="radio" class="addReq point-2" name="q9_currentlyAttending" id="tjcInDistrict" value="Yes"<?=(isset($answers[9]['answer']) && $answers[9]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Yes
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" class="rmReq" name="q9_currentlyAttending" id="tjcInDistrict_not" value="No"<?=(isset($answers[9]['answer']) && $answers[9]['answer'] == "No" ? ' checked="checked"' : ''); ?>> No
                  </label>
                </div>
              </div>
              <div class="col-sm-2">
              Points: <input type="text" class="form-control points" id="tjcInDistrict_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Bonus Points</h3>
          </div>
        </div>
        <div class="form-group">
        	<label class="col-sm-2 control-label">BIOL 2404</label>
        	<div class="col-sm-10">
        		<div class="form-group">
        			<div class="col-sm-3">
        				Grade: <?= selectGrade('q10_biol2404', 'biol2404', 1, (isset($answers[10]['answer']) ? $answers[10]['answer'] : '')); ?>
        			</div>
        			<div class="col-md-4 col-sm-offset-2 checkbox">
		                <input type="hidden" name="q11_biol240411" value="No">
		                <label>
		                  <input type="checkbox" name="q11_biol240411" class="completed" id="biol2401_completed" value="Yes"<?=(isset($answers[11]['answer']) && $answers[11]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Course was completed at TJC.
		                </label>
		            </div>
		            <div class="col-sm-2 col-sm-offset-1">
              			Points: <input type="text" class="form-control points" id="biol2404_points" value="0" readonly>
              		</div>
        		</div>
        	</div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">HPRS 1201<br />HPRS 1103</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-10">
                <div class="checkbox">
                  <input type="hidden" name="q13_hprs1201" value="No">
                  <label>
                    <input type="checkbox" class="addReq point-1" name="q13_hprs1201" id="hprs1201" value="Yes"<?=(isset($answers[13]['answer']) && $answers[13]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Introduction to the Health Profession<br /><small>Completed with a "B" or better.</small>
                  </label>
                </div>
              </div>
              <div class="col-sm-2">
              Points: <input type="text" class="form-control points" id="hprs1201_points" value="0" readonly>
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
        <input type="hidden" id="simple_spc" name="simple_spc" value="52374252783964" />
        <script type="text/javascript">
          document.getElementById("si" + "mple" + "_spc").value = "52374252783964-52374252783964";
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

    	var calcHesiPoints = function() {
    		$('.hesi_score').each(function() {
    			// Now we calculate the individual scores.
    			var percentage = parseInt($(this).attr("class").substr(-1, 1) * 5) / 100;
    			var score = parseFloat($(this).val());
    			var points = 0;
    			if($.isNumeric(score)) {
    				points = Math.round(score * percentage);
    			}
    			var scoreId = "#" + $(this).attr("id") + "Score";
    			$(scoreId).val(points);
	    	});

    		var totals = 0;
    		$('.hesi_points').each(function() {
    			totals += parseFloat($(this).val());
    		});

    		$('#hesiTotal_points').val(totals);

    		totalPoints();
    	};

    	var calcGrade = function() {
    		var grade = $('#biol2404_grade').val();
    		var points = 0;

    		switch (grade) {
    			case 'A':
    				points = 6;
    				break;

    			case 'B':
    				points = 4;
    				break;

    			case 'C':
    				points = 2;
    				break;
    		}

    		$('#biol2404_points').val(points);

    		totalPoints();
    	};

    	var calcCompleted = function() {
    		var pointTotal = parseInt($('#biol2404_points').val());

	        if($('#biol2401_completed').is(":not(:checked)") && $('#biol2404_points').hasClass("completedAddReq")) {
	        	pointTotal = pointTotal - 1;
	          	$('#biol2404_points').removeClass("completedAddReq");
	        } else if($('#biol2401_completed').is(":checked")) {
	          	pointTotal = pointTotal + 1;
	          	$('#biol2404_points').addClass("completedAddReq");
	        }

	        // Update points.
	        $('#biol2404_points').val(pointTotal);

    		totalPoints();
    	};

    	$(document).ready(function() {
    		$('body').on('change', '.addReq', function() {
          		calcAddReq($(this));
        	});
        	$('body').on('change', '.rmReq', function() {
          		calcRmReq($(this));
        	});
        	$('body').on('change', '.hesi_score', function() {
          		calcHesiPoints();
        	});

        	$('body').on('change', '#biol2404_grade', function() {
        		calcGrade();
        	});

        	$('body').on('change', '.completed', function() {
          		calcCompleted();
        	});

        	// We calculate any sort of data that has been saved and is passed to the form.
        	calcHesiPoints();
        	calcGrade();
        	calcCompleted();
        	$('.addReq').each(function() {
        		calcAddReq($(this));
        	});
        	totalPoints();
    	});
    </script>