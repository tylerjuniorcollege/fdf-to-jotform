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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Dental Hygiene Admission Worksheet">
    <meta name="author" content="Tyler Junior College">

    <title>Dental Hygiene Admission Worksheet - Tyler Junior College</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">
      <div class="row page-header">
        <h3>Dental Hygiene Admission Worksheet</h3>
      </div>
      <form class="form-horizontal" action="https://submit.jotformpro.com/submit/51525414183955/" method="post" name="form_51525414183955">
        <input type="hidden" name="formID" value="51525414183955">
<?php if(isset($data['id'])): ?>
        <input type="hidden" name="editSubmission" value="<?=$data['id']?>">
<?php endif; ?>
        <div class="form-group">
          <label for="input_3" class="col-sm-2 control-label">Applicant Name</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="q3_applicantName[first]" placeholder="First Name" value="<?= (isset($answers[3]['answer']['first']) ? $answers[3]['answer']['first'] : '' )?>" aria-describedby="firstName">
            <span class="help-block" id="firstName">First Name</span>
          </div>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="q3_applicantName[last]" placeholder="Last Name" value="<?= (isset($answers[3]['answer']['last']) ? $answers[3]['answer']['last'] : '' )?>" aria-describedby="lastName">
            <span class="help-block" id="lastName">Last Name</span>
          </div>
        </div>
        <div class="form-group">
          <label for="input_4" class="col-sm-2 control-label">TJC Email Address</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="q4_tjcEmail" placeholder="ex: student@tjc.edu" value="<?= (isset($answers[4]['answer']) ? $answers[4]['answer'] : '' )?>">
          </div>
        </div>
        <div class="row page-header">
          <h4>Follow the instructions below to calculate your admission points:</h4>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            Include ALL Grades earned January 2011 or later. For any repeated course; If there are multiple grades for the same course number, consider highest grade earned January 2011 or later.
          </div>
        </div>
        <div class="form-group">
          <label for="input_5" class="col-sm-2 control-label">BIOL 2401</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-1">
                Grade: <?= selectGrade('q5_biol2401', 'biol2401', 4, (isset($answers[5]['answer']) ? $answers[5]['answer'] : '')); ?>
              </div>
              <div class="col-sm-3">
                Semester: <input type="text" class="form-control" id="input_6" name="q6_biol24016" placeholder="ex: Fall" value="<?= (isset($answers[6]['answer']) ? $answers[6]['answer'] : ''); ?>">
              </div>
              <div class="col-sm-2">
                Year: <input type="text" class="form-control" id="input_7" name="q7_biol24017" placeholder="ex: 2005" value="<?=(isset($answers[7]['answer']) ? $answers[7]['answer'] : ''); ?>">
              </div>
              <div class="col-sm-3 checkbox">
                <input type="hidden" name="q8_biol24018" value="No">
                <label>
                  <input type="checkbox" name="q8_biol24018" class="completed" id="biol2401_completed" value="Yes"<?=(isset($answers[8]['answer']) && $answers[8]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Course was completed at TJC in the past 5 years with a "C" or better.
                </label>
              </div>
              <div class="col-sm-2 checkbox">
                <input type="hidden" name="q9_biol24019" value="No">
                <label>
                  <input type="checkbox" name="q9_biol24019" class="repeated" id="biol2401_repeated" value="Yes"<?=(isset($answers[9]['answer']) && $answers[9]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Course was repeated in the last 5 years.
                </label>
              </div>
              <div class="col-sm-1">
                Points: <input type="text" class="form-control points" id="biol2401_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="input_10" class="col-sm-2 control-label">BIOL 2402</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-1">
                Grade: <?= selectGrade('q10_biol2402', 'biol2402', 4, (isset($answers[10]['answer']) ? $answers[10]['answer'] : '')); ?>
              </div>
              <div class="col-sm-3">
                Semester: <input type="text" class="form-control" id="input_11" name="q11_biol240211" placeholder="ex: Fall" value="<?= (isset($answers[11]['answer']) ? $answers[11]['answer'] : ''); ?>">
              </div>
              <div class="col-sm-2">
                Year: <input type="text" class="form-control" id="input_12" name="q12_biol240212" placeholder="ex: 2005" value="<?= (isset($answers[12]['answer']) ? $answers[12]['answer'] : ''); ?>">
              </div>
              <div class="col-sm-3 checkbox">
                <input type="hidden" name="q13_biol240213" value="No">
                <label>
                  <input type="checkbox" name="q13_biol240213" class="completed" id="biol2402_completed" value="Yes"<?=(isset($answers[13]['answer']) && $answers[13]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Course was completed at TJC in the past 5 years with a "C" or better.
                </label>
              </div>
              <div class="col-sm-2 checkbox">
                <input type="hidden" name="q14_biol240214" value="No">
                <label>
                  <input type="checkbox" name="q14_biol240214" class="repeated" id="biol2402_repeated" value="Yes"<?=(isset($answers[14]['answer']) && $answers[14]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Course was repeated in the last 5 years.
                </label>
              </div>
              <div class="col-sm-1">
                Points: <input type="text" class="form-control points" id="biol2402_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="input_10" class="col-sm-2 control-label">BIOL 2420</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-1">
                Grade: <?= selectGrade('q15_biol2420', 'biol2420', 4, (isset($answers[15]['answer']) ? $answers[15]['answer'] : '')); ?>
              </div>
              <div class="col-sm-3">
                Semester: <input type="text" class="form-control" id="input_16" name="q16_biol242016" placeholder="ex: Fall" value="<?= (isset($answers[16]['answer']) ? $answers[16]['answer'] : ''); ?>">
              </div>
              <div class="col-sm-2">
                Year: <input type="text" class="form-control" id="input_17" name="q17_biol242017" placeholder="ex: 2005" value="<?= (isset($answers[17]['answer']) ? $answers[17]['answer'] : ''); ?>">
              </div>
              <div class="col-sm-3 checkbox">
                <input type="hidden" name="q18_biol242018" value="No">
                <label>
                  <input type="checkbox" name="q18_biol242018" class="completed" id="biol2420_completed" value="Yes"<?=(isset($answers[18]['answer']) && $answers[18]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Course was completed at TJC in the past 5 years with a "C" or better.
                </label>
              </div>
              <div class="col-sm-2 checkbox">
                <input type="hidden" name="q19_biol242019" value="No">
                <label>
                  <input type="checkbox" name="q19_biol242019" class="repeated" id="biol2420_repeated" value="Yes"<?=(isset($answers[19]['answer']) && $answers[19]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Course was repeated in the last 5 years.
                </label>
              </div>
              <div class="col-sm-1">
                Points: <input type="text" class="form-control points" id="biol2420_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="input_10" class="col-sm-2 control-label">CHEM 1405/1406/1411</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-1">
                Grade: <?= selectGrade('q20_chem140514061411', 'chem140514061411', 4, (isset($answers[20]['answer']) ? $answers[20]['answer'] : '')); ?>
              </div>
              <div class="col-sm-3">
                Semester: <input type="text" class="form-control" id="input_21" name="q21_chem14051406141121" placeholder="ex: Fall" value="<?= (isset($answers[21]['answer']) ? $answers[21]['answer'] : ''); ?>">
              </div>
              <div class="col-sm-2">
                Year: <input type="text" class="form-control" id="input_22" name="q22_chem14051406141122" placeholder="ex: 2005" value="<?= (isset($answers[22]['answer']) ? $answers[22]['answer'] : ''); ?>">
              </div>
              <div class="col-sm-3 checkbox">
                <input type="hidden" name="q23_chem14051406141123" value="No">
                <label>
                  <input type="checkbox" name="q23_chem14051406141123" class="completed" id="chem140514061411_completed" value="Yes"<?=(isset($answers[23]['answer']) && $answers[23]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Course was completed at TJC in the past 5 years with a "C" or better.
                </label>
              </div>
              <div class="col-sm-2 checkbox">
                <input type="hidden" name="q24_chem14051406141124" value="No">
                <label>
                  <input type="checkbox" name="q24_chem14051406141124" class="repeated" id="chem140514061411_repeated" value="Yes"<?=(isset($answers[24]['answer']) && $answers[24]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Course was repeated in the last 5 years.
                </label>
              </div>
              <div class="col-sm-1">
                Points: <input type="text" class="form-control points" id="chem140514061411_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            Include ALL Grades earned on or after Feburary 16, 2014; If there are multiple grades for the same course number, consider highest grade earned on or after Feburary 16, 2014.
          </div>
        </div>
        <div class="form-group">
          <label for="input_10" class="col-sm-2 control-label">BIOL 1322</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-1">
                Grade: <?= selectGrade('q25_biol1322', 'biol1322', 2, (isset($answers[25]['answer']) ? $answers[25]['answer'] : '')); ?>
              </div>
              <div class="col-sm-3">
                Semester: <input type="text" class="form-control" id="input_26" name="q26_biol132226" placeholder="ex: Fall" value="<?= (isset($answers[26]['answer']) ? $answers[26]['answer'] : ''); ?>">
              </div>
              <div class="col-sm-2">
                Year: <input type="text" class="form-control" id="input_27" name="q27_biol132227" placeholder="ex: 2005" value="<?= (isset($answers[27]['answer']) ? $answers[27]['answer'] : ''); ?>">
              </div>
              <div class="col-sm-2 col-sm-offset-3 checkbox">
                <input type="hidden" name="q28_biol132228" value="No">
                <label>
                  <input type="checkbox" name="q28_biol132228" class="repeated" id="biol1322_repeated" value="Yes"<?=(isset($answers[28]['answer']) && $answers[28]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Course was repeated in the last 5 years.
                </label>
              </div>
              <div class="col-sm-1">
                Points: <input type="text" class="form-control points" id="biol1322_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            Elective courses include any 3 credit course which begins with the appropriate prefix. Ex: PSYC 2301, 2314, etc. Include ALL grades earned for any repeated course; If there are multiple grades for the same course number, consider highest grade earned.
          </div>
        </div>
        <div class="form-group">
          <label for="input_10" class="col-sm-2 control-label">ENGL 1301</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-1">
                Grade: <?= selectGrade('q29_engl1301', 'engl1301', 1, (isset($answers[29]['answer']) ? $answers[29]['answer'] : '')); ?>
              </div>
              <div class="col-sm-3">
                Semester: <input type="text" class="form-control" id="input_30" name="q30_engl130130" placeholder="ex: Fall" value="<?= (isset($answers[30]['answer']) ? $answers[30]['answer'] : ''); ?>">
              </div>
              <div class="col-sm-2">
                Year: <input type="text" class="form-control" id="input_31" name="q31_engl130131" placeholder="ex: 2005" value="<?= (isset($answers[31]['answer']) ? $answers[31]['answer'] : ''); ?>">
              </div>
              <div class="col-sm-2 col-sm-offset-3 checkbox">
                <input type="hidden" name="q32_engl130132" value="No">
                <label>
                  <input type="checkbox" name="q32_engl130132" class="repeated repeated-half" id="engl1301_repeated" value="Yes"<?=(isset($answers[32]['answer']) && $answers[32]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Course was repeated in the last 5 years.
                </label>
              </div>
              <div class="col-sm-1">
                Points: <input type="text" class="form-control points" id="engl1301_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="input_10" class="col-sm-2 control-label">PSYC Elective</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-1">
                Grade: <?= selectGrade('q33_psycElective', 'psycElective', 1, (isset($answers[33]['answer']) ? $answers[33]['answer'] : '')); ?>
              </div>
              <div class="col-sm-3">
                Semester: <input type="text" class="form-control" id="input_34" name="q34_psycElective34" placeholder="ex: Fall" value="<?= (isset($answers[34]['answer']) ? $answers[34]['answer'] : ''); ?>">
              </div>
              <div class="col-sm-2">
                Year: <input type="text" class="form-control" id="input_35" name="q35_psycElective35" placeholder="ex: 2005" value="<?= (isset($answers[35]['answer']) ? $answers[35]['answer'] : ''); ?>">
              </div>
              <div class="col-sm-2 col-sm-offset-3 checkbox">
                <input type="hidden" name="q36_psycElective36" value="No">
                <label>
                  <input type="checkbox" name="q36_psycElective36" class="repeated repeated-half" id="psycElective_repeated" value="Yes"<?=(isset($answers[36]['answer']) && $answers[36]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Course was repeated in the last 5 years.
                </label>
              </div>
              <div class="col-sm-1">
                Points: <input type="text" class="form-control points" id="psycElective_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="input_10" class="col-sm-2 control-label">SOCI Elective</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-1">
                Grade: <?= selectGrade('q37_sociElective', 'sociElective', 1, (isset($answers[37]['answer']) ? $answers[37]['answer'] : '')); ?>
              </div>
              <div class="col-sm-3">
                Semester: <input type="text" class="form-control" id="input_38" name="q38_sociElective38" placeholder="ex: Fall" value="<?= (isset($answers[38]['answer']) ? $answers[38]['answer'] : ''); ?>">
              </div>
              <div class="col-sm-2">
                Year: <input type="text" class="form-control" id="input_39" name="q39_sociElective39" placeholder="ex: 2005" value="<?= (isset($answers[39]['answer']) ? $answers[39]['answer'] : ''); ?>">
              </div>
              <div class="col-sm-2 col-sm-offset-3 checkbox">
                <input type="hidden" name="q40_sociElective40" value="No">
                <label>
                  <input type="checkbox" name="q40_sociElective40" class="repeated repeated-half" id="sociElective_repeated" value="Yes"<?=(isset($answers[40]['answer']) && $answers[40]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Course was repeated in the last 5 years.
                </label>
              </div>
              <div class="col-sm-1">
                Points: <input type="text" class="form-control points" id="sociElective_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="input_10" class="col-sm-2 control-label">HUMA/Fine Art Elective</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-1">
                Grade: <?= selectGrade('q41_humafineArt', 'humaFineArt', 1, (isset($answers[41]['answer']) ? $answers[41]['answer'] : '')); ?>
              </div>
              <div class="col-sm-3">
                Semester: <input type="text" class="form-control" id="input_42" name="q42_humafineArt42" placeholder="ex: Fall" value="<?= (isset($answers[42]['answer']) ? $answers[42]['answer'] : ''); ?>">
              </div>
              <div class="col-sm-2">
                Year: <input type="text" class="form-control" id="input_43" name="q43_humafineArt43" placeholder="ex: 2005" value="<?= (isset($answers[43]['answer']) ? $answers[43]['answer'] : ''); ?>">
              </div>
              <div class="col-sm-2 col-sm-offset-3 checkbox">
                <input type="hidden" name="q44_humafineArt44" value="No">
                <label>
                  <input type="checkbox" name="q44_humafineArt44" class="repeated repeated-half" id="humaFineArt_repeated" value="Yes"<?=(isset($answers[44]['answer']) && $answers[44]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Course was repeated in the last 5 years.
                </label>
              </div>
              <div class="col-sm-1">
                Points: <input type="text" class="form-control points" id="humaFineArt_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="input_10" class="col-sm-2 control-label">SPCH Elective</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-1">
                Grade: <?= selectGrade('q45_spchElective', 'spchElective', 1, (isset($answers[45]['answer']) ? $answers[45]['answer'] : '')); ?>
              </div>
              <div class="col-sm-3">
                Semester: <input type="text" class="form-control" id="input_46" name="q46_spchElective46" placeholder="ex: Fall" value="<?= (isset($answers[46]['answer']) ? $answers[46]['answer'] : ''); ?>">
              </div>
              <div class="col-sm-2">
                Year: <input type="text" class="form-control" id="input_47" name="q47_spchElective47" placeholder="ex: 2005" value="<?= (isset($answers[47]['answer']) ? $answers[47]['answer'] : ''); ?>">
              </div>
              <div class="col-sm-2 col-sm-offset-3 checkbox">
                <input type="hidden" name="q48_spchElective48" value="No">
                <label>
                  <input type="checkbox" name="q48_spchElective48" class="repeated repeated-half" id="spchElective_repeated" value="Yes"<?=(isset($answers[48]['answer']) && $answers[48]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Course was repeated in the last 5 years.
                </label>
              </div>
              <div class="col-sm-1">
                Points: <input type="text" class="form-control points" id="spchElective_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">HESI A2 Version 1 Composite Score (Maximum 30 points) - only use test scores taken on or after Feburary 16, 2014</h3>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">HESI Score</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-9">
                Based on the following five sections: <br />
                a) Math (minimum 75% required)&nbsp;&nbsp;&nbsp;&nbsp;b) Reading (minimum 75% required)&nbsp;&nbsp;&nbsp;&nbsp;c) Vocabulary/General Knowledge<br />
                d) Chemistry&nbsp;&nbsp;&nbsp;&nbsp;e) Anatomy & Physiology
              </div>
              <div class="col-sm-2">
                Composite Score: <input type="text" name="q49_hesiScore" id="hesiScore" value="<?= (isset($answers[49]['answer']) ? $answers[49]['answer'] : ''); ?>" class="form-control" placeholder="ex: 30">
              </div>
              <div class="col-sm-1">
                Points: <input type="text" class="form-control points" id="hesiScore_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Tyler Junior College district classification</h3>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"></label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-11">
                Are you classified as an "In-District" student for Tyler Junior College?
                <div class="radio">
                  <label>
                    <input type="radio" class="addReq point-2" name="q50_indistrictFor" id="tjcInDistrict" value="Yes"<?=(isset($answers[50]['answer']) && $answers[50]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Yes
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" class="rmReq" name="q50_indistrictFor" id="tjcInDistrict_not" value="No"<?=(isset($answers[50]['answer']) && $answers[50]['answer'] == "No" ? ' checked="checked"' : ''); ?>> No
                  </label>
                </div>
              </div>
              <div class="col-sm-1">
              Points: <input type="text" class="form-control points" id="tjcInDistrict_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Other Requirements</h3>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">HPRS 1201<br />HPRS 1105</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-11">
                <div class="checkbox">
                  <input type="hidden" name="q51_hprs1201" value="No">
                  <label>
                    <input type="checkbox" class="addReq point-1" name="q51_hprs1201" id="hprs1201" value="Yes"<?=(isset($answers[51]['answer']) && $answers[51]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Introduction to Health Professions <strong>AND</strong><br /> Essentials of Medical Law Ethics for Health Professionals<br /><small>Completed with a "B" or better in both courses.</small>
                  </label>
                </div>
              </div>
              <div class="col-sm-1">
              Points: <input type="text" class="form-control points" id="hprs1201_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">HITT 1305</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-11">
                <div class="checkbox">
                  <input type="hidden" name="q52_hitt1305" value="No">
                  <label>
                    <input type="checkbox" class="addReq point-1" name="q52_hitt1305" id="hitt1305" value="Yes"<?=(isset($answers[52]['answer']) && $answers[52]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Medical Terminology I<br /><small>Course Completed with a "B" or better.</small>
                  </label>
                </div>
              </div>
              <div class="col-sm-1">
              Points: <input type="text" class="form-control points" id="hitt1305_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">HITT 1303</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-11">
                <div class="checkbox">
                  <input type="hidden" name="q53_hitt1303" value="No">
                  <label>
                    <input type="checkbox" class="addReq point-1" name="q53_hitt1303" id="hitt1303" value="Yes"<?=(isset($answers[53]['answer']) && $answers[53]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Medical Terminology II<br /><small>Course Completed with a "B" or better.</small>
                  </label>
                </div>
              </div>
              <div class="col-sm-1">
              Points: <input type="text" class="form-control points" id="hitt1303_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">TJC DA Student</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-11">
                <div class="checkbox">
                  <input type="hidden" name="q54_tjcDa" value="No">
                  <label>
                    <input type="checkbox" class="addReq point-3" name="q54_tjcDa" id="tjcDa" value="Yes"<?=(isset($answers[54]['answer']) && $answers[54]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Currently enrolled in spring semester of accredited TJC DA program
                  </label>
                </div>
              </div>
              <div class="col-sm-1">
              Points: <input type="text" class="form-control points" id="tjcDa_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">CDA</label>
          <div class="col-sm-10">
            <div class="form-group">
              <div class="col-sm-11">
                <div class="checkbox">
                  <input type="hidden" name="q55_cda" value="No">
                  <label>
                    <input type="checkbox" class="addReq point-6" name="q55_cda" id="cda" value="Yes"<?=(isset($answers[55]['answer']) && $answers[55]['answer'] == "Yes" ? ' checked="checked"' : ''); ?>> Current CDA License
                  </label>
                </div>
              </div>
              <div class="col-sm-1">
              Points: <input type="text" class="form-control points" id="cda_points" value="0" readonly>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-offset-9">Total Points:</label>
          <div class="col-sm-1">
            <div class="form-group">
              <div class="col-sm-10 col-sm-offset-2">
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
        <input type="hidden" id="simple_spc" name="simple_spc" value="51525414183955" />
        <script type="text/javascript">
          document.getElementById("si" + "mple" + "_spc").value = "51525414183955-51525414183955";
        </script>
      </form>
    </div><!-- /.container -->
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

      var gradePoints = function(grade, modifier) {
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
            break;
          default:
            gp = 0;
            break;
        }

        gp = gp * parseInt(modifier);
        return gp;
      };

      var calcRepeated = function(id) {
        var pointEle = $(id).attr("id").replace("_repeated", "_points");
        var pointTotal = parseFloat($('#' + pointEle).val());
        var repeatedScore = 1;

        if($(id).hasClass('repeated-half')) {
          repeatedScore = repeatedScore - 0.5;
        }

        if($(id).is(":not(:checked)") && $('#' + pointEle).hasClass("repeatedCalculated")) {
          // We need to add the point back and remove the class.
          pointTotal = pointTotal + repeatedScore;
          $('#' + pointEle).removeClass("repeatedCalculated");
        } else if($(id).is(":checked")) {
          pointTotal = pointTotal - repeatedScore;

          $('#' + pointEle).addClass("repeatedCalculated");
        }

        // Update points.
        $('#' + pointEle).val(pointTotal);

        totalPoints(); // Recalc totalPoints.
      };

      var calcCompleted = function(id) {
        var pointEle = $(id).attr("id").replace("_completed", "_points");
        var pointTotal = parseFloat($('#' + pointEle).val());

        if($(id).is(":not(:checked)") && $('#' + pointEle).hasClass("completedCalculated")) {
          // We need to remove the point.
          pointTotal = pointTotal - 1;
          $('#' + pointEle).removeClass("completedCalculated");
        } else if($(id).is(":checked")) {
          pointTotal = pointTotal + 1;
          $('#' + pointEle).addClass("completedCalculated");
        }

        // Update points.
        $('#' + pointEle).val(pointTotal);

        totalPoints(); // Recalc totalPoints.
      };

      var calcGrade = function(id) {
        var pointEle = $(id).attr("id").replace("_grade", "_points");
        var pointTotal = 0; //parseFloat($('#' + pointEle).val()); - We need to reset this to calculate properly.
        var grade = $(id).val();
        var modifier = $(id).attr("class").substr(-1, 1);

        pointTotal = pointTotal + gradePoints(grade, modifier);

        $('#' + pointEle).val(pointTotal);

        totalPoints();
        return;
      };

      var calcComposite = function(id) {
        var pointEle = $(id).attr("id") + "_points";
        var compScore = parseFloat($(id).val());
        var pointTotal = 0;

        if($.isNumeric(compScore)) {
          pointTotal = compScore * 0.30;
        }

        $('#' + pointEle).val(pointTotal);

        totalPoints();        
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

      $(document).ready(function(){
        $('body').on('change load', '.grade', function(){ 
          calcGrade($(this)); 
        });

        $('body').on('change load', '.repeated', function() {
          calcRepeated($(this));
        });

        $('body').on('change load', '.completed', function() {
          calcCompleted($(this));
        });

        $('body').on('change', '#hesiScore', function() {
          calcComposite($(this));
        });

        $('body').on('change', '.addReq', function() {
          calcAddReq($(this));
        });

        $('body').on('change', '.rmReq', function() {
          calcRmReq($(this));
        });

        // Now we need to recalculate all of the various points, if the data was loaded on page load.
        $('.points').each(function() {
          var datapointId = '#' + $(this).attr('id').replace("_points", "");

          if($(datapointId + '_grade').length > 0) {
            // This is a grade element
            calcGrade($(datapointId + '_grade'));
            calcRepeated($(datapointId + '_repeated'));
            if($(datapointId + '_completed').length > 0) {
              calcCompleted($(datapointId + '_completed'));
            }
          } else if($(datapointId).length > 0) {
            // These are the other ones.
            if(datapointId == '#hesiScore') {
              calcComposite($(datapointId));
            } else {
              calcAddReq($(datapointId));
            }
          }
        });
      }); 
    </script>
  </body>
</html>
