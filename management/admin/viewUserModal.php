<?php ?>


<div class="modal fade" id="viewUserModal" tabindex="-1" role="dialog" aria-labelledby="viewUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewSchoolModalLabel">View User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><strong>User ID</strong></td>
                            <td id="userRefNo"></td>
                            <td><strong>Email</strong></td>
                            <td id="user_email"></td>
                        </tr>
                        <tr>
                            <td><strong>Position</strong></td>
                            <td id="user_position"></td>
                            <td><strong>Team Reference</strong></td>
                            <td id="TeamRefNumber"></td>
                        </tr>
                        <tr>
                            <td><strong>Reg Status</strong></td>
                            <td id="reg_status"></td>
                            <td><strong>Password</strong></td>
                            <td id="userPassword"></td>
                        </tr>
                        <tr>
                            <td><strong>Terms & Condition</strong></td>
                            <td id="termsCondition"></td>
                            <td><strong>Time Created</strong></td>
                            <td id="time_created"></td>
                        </tr>
                        <tr>
                            <td><strong>Date Created</strong></td>
                            <td id="date_created"></td>
                            <td><strong>Time Reset</strong></td>
                            <td id="timeReset"></td>
                        </tr>
                        <tr>
                            <td><strong>Date Reset</strong></td>
                            <td id="dateReset"></td>
                            <td><strong>IP Address</strong></td>
                            <td id="ipAddress"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php ?>