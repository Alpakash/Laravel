<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100">Are you sure you want to delete <span class="home-color">{{ $user->email }}</span> game?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer d-flex justify-content-center justify-content-center">
                <form action="{{ route('admin.post.permissions', $user->id) }}" method="post">
                    @csrf
                    <select name="role_id" class="custum-select">
                        <option {{ ($user->Role->role == 'User') ? 'selected' : '' }} value="3">Deelnemer</option>
                        <option {{ ($user->Role->role == 'Judge') ? 'selected' : '' }} value="2">Judge</option>
                    </select>
                    <button type="submit" class="btn bg-home-color sign-btn "  style="color: white !important;background: #d2996f !important;"> delete</button>
                </form>
            </div>
        </div>
    </div>
</div>