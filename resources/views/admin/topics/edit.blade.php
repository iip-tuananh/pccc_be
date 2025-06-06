<div class="modal fade" id="edit-topic" tabindex="-1" role="dialog" aria-hidden="true" ng-controller="EditTopic">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="semi-bold">Cập nhật topic</h4>
            </div>
            <div class="modal-body">
                @include('admin.topics.form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-cons" ng-click="submit()" ng-disabled="loading.submit">
                    <i ng-if="!loading.submit" class="fa fa-save"></i>
                    <i ng-if="loading.submit" class="fa fa-spin fa-spinner"></i>
                    Lưu
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i> Hủy</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    app.controller('EditTopic', function ($rootScope, $scope, $http) {
        $rootScope.$on("editTopic", function (event, data){
            $scope.form = new Topic(data, {scope: $scope});

            $scope.$applyAsync();
            $scope.loading.submit = false;

            $('#edit-topic').modal('show');
        });

        $scope.loading = {};
        // Submit Form sửa
        $scope.submit = function () {

            let url = "/admin/topic/" + $scope.form.id + "/update";
            $scope.loading.submit = true;

            $.ajax({
                type: "POST",
                url: url,
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                data: $scope.form.submit_data,
                success: function (response) {
                    if (response.success) {
                        $('#edit-topic').modal('hide');
                        toastr.success(response.message);
                        datatable.ajax.reload();
                        $scope.errors = null;

                    } else {
                        $scope.errors = response.errors;
                        toastr.warning(response.message);
                    }
                },
                error: function () {
                    toastr.error('Đã có lỗi xảy ra');
                },
                complete: function () {
                    $scope.loading.submit = false;
                    $scope.$applyAsync();
                },
            });
        }
    })
</script>
