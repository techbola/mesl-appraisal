$(document).on("click", ".editFinanceDialog", function () {

    let appraisalId = $(this).data('id');
    let appraisalObjective = $(this).data('objective');
    let appraisalKpi = $(this).data('kpi');
    let appraisalTargets = $(this).data('targets');
    let appraisalConstraint = $(this).data('constraint');
    let appraisalAssessment = $(this).data('assessment');

    $("#financeAppraisalID").val( appraisalId );
    $("#financeAppraisalObjective").val( appraisalObjective );
    $("#financeAppraisalKpi").val( appraisalKpi );
    $("#financeAppraisalTargets").val( appraisalTargets );
    $("#financeAppraisalConstraint").val( appraisalConstraint );
    $("#financeAppraisalAssessment").val( appraisalAssessment );

});

$(document).on("click", ".editCustomerDialog", function () {

    let appraisalId = $(this).data('id');
    let appraisalObjective = $(this).data('objective');
    let appraisalKpi = $(this).data('kpi');
    let appraisalTargets = $(this).data('targets');
    let appraisalConstraint = $(this).data('constraint');
    let appraisalAssessment = $(this).data('assessment');

    $("#customerAppraisalID").val( appraisalId );
    $("#customerAppraisalObjective").val( appraisalObjective );
    $("#customerAppraisalKpi").val( appraisalKpi );
    $("#customerAppraisalTargets").val( appraisalTargets );
    $("#customerAppraisalConstraint").val( appraisalConstraint );
    $("#customerAppraisalAssessment").val( appraisalAssessment );

});

$(document).on("click", ".editInternalDialog", function () {

    let appraisalId = $(this).data('id');
    let appraisalObjective = $(this).data('objective');
    let appraisalKpi = $(this).data('kpi');
    let appraisalTargets = $(this).data('targets');
    let appraisalConstraint = $(this).data('constraint');
    let appraisalAssessment = $(this).data('assessment');

    $("#internalAppraisalID").val( appraisalId );
    $("#internalAppraisalObjective").val( appraisalObjective );
    $("#internalAppraisalKpi").val( appraisalKpi );
    $("#internalAppraisalTargets").val( appraisalTargets );
    $("#internalAppraisalConstraint").val( appraisalConstraint );
    $("#internalAppraisalAssessment").val( appraisalAssessment );

});

$(document).on("click", ".editLearningDialog", function () {

    let appraisalId = $(this).data('id');
    let appraisalObjective = $(this).data('objective');
    let appraisalKpi = $(this).data('kpi');
    let appraisalTargets = $(this).data('targets');
    let appraisalConstraint = $(this).data('constraint');
    let appraisalAssessment = $(this).data('assessment');

    $("#learningAppraisalID").val( appraisalId );
    $("#learningAppraisalObjective").val( appraisalObjective );
    $("#learningAppraisalKpi").val( appraisalKpi );
    $("#learningAppraisalTargets").val( appraisalTargets );
    $("#learningAppraisalConstraint").val( appraisalConstraint );
    $("#learningAppraisalAssessment").val( appraisalAssessment );

});