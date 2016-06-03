<form method="POST" name='status' class="status">

    <input type="hidden" name="id" id="id" value="{{ $CV->id }}"/>
    <input type="hidden" name="CV_status" id="CV_status" value="{{ $CV->Status }}"/>
    <select class="form-control status" name="status" id="status{{ $CV->id }}">
        <option value="0" <?php
        if ($CV->Status == 0) {
            echo 'selected="select"';
        }

        ?>>Chờ duyệt</option>

        <option value="1" <?php
        if ($CV->Status == 1) {
            echo 'selected="select"';
        }

        ?>>Đồng ý phỏng vấn</option>

        <option value="2" <?php
        if ($CV->Status == 2) {
            echo 'selected="select"';
        }

        ?>>Đặt lịch phỏng vấn</option>

        <option value="3" <?php
        if ($CV->Status == 3) {
            echo 'selected="select"';
        }

        ?>>Testing</option>

        <option value="4" <?php
        if ($CV->Status == 4) {
            echo 'selected="select"';
        }

        ?>>Đã qua test</option>

        <option value="5" <?php
        if ($CV->Status == 5) {
            echo 'selected="select"';
        }

        ?>>Không qua test</option>

        <option value="6" <?php
        if ($CV->Status == 6) {
            echo 'selected="select"';
        }

        ?>>Đã phỏng vấn</option>

        <option value="7" <?php
        if ($CV->Status == 7) {
            echo 'selected="select"';
        }

        ?>>Đồng ý làm bài test</option>

        <option value="8" <?php
        if ($CV->Status == 8) {
            echo 'selected="select"';
        }

        ?>>Đã làm bài test</option>

        <option value="9" <?php
        if ($CV->Status == 9) {
            echo 'selected="select"';
        }

        ?>>Từ chối làm bài test</option>

        <option value="10" <?php
        if ($CV->Status == 10) {
            echo 'selected="select"';
        }

        ?>>Đã nhận bài test gửi về</option>

        <option value="11" <?php
        if ($CV->Status == 11) {
            echo 'selected="select"';
        }

        ?>>Nhận</option>

        <option value="12" <?php
        if ($CV->Status == 12) {
            echo 'selected="select"';
        }

        ?>>Đã gửi mail offer</option>

        <option value="13" <?php
        if ($CV->Status == 13) {
            echo 'selected="select"';
        }

        ?>>Đã checkin</option>

        <option value="14" <?php
        if ($CV->Status == 14) {
            echo 'selected="select"';
        }

        ?>>Đã checkout</option>

        <option value="15" <?php
        if ($CV->Status == 15) {
            echo 'selected="select"';
        }

        ?>>Đã từ chối offer</option>

        <option value="16" <?php
        if ($CV->Status == 16) {
            echo 'selected="select"';
        }

        ?>>Đã xin nhận offer</option>

        <option value="17" <?php
        if ($CV->Status == 17) {
            echo 'selected="select"';
        }

        ?>>Lưu hồ sơ</option>

        <option value="18" <?php
        if ($CV->Status == 18) {
            echo 'selected="select"';
        }

        ?>>Từ chối phỏng vấn</option>

        <option value="19" <?php
        if ($CV->Status == 19) {
            echo 'selected="select"';
        }

        ?>>Đã đặt lịch làm bài test</option>
    </select>
</form>