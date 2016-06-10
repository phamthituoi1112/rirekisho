<form method="POST" name='status' class="status">

    <input type="hidden" name="id" id="id" value="{{ $CV->id }}"/>
    <input type="hidden" name="CV_status" id="CV_status{{ $CV->id }}" value="{{ $CV->Status }}"/>
    <select class="form-control status" name="status" id="status{{ $CV->id }}">
        <option value="0" <?php
        if ($CV->Status == 0) {
            echo 'selected="select"';
        }

        ?>>0: Chờ duyệt</option>

        <option value="1" <?php
        if ($CV->Status == 1) {
            echo 'selected="select"';
        }

        ?>>1: Đồng ý phỏng vấn</option>

        <option value="2" <?php
        if ($CV->Status == 2) {
            echo 'selected="select"';
        }

        ?>>2: Đặt lịch phỏng vấn</option>

        <option value="3" <?php
        if ($CV->Status == 3) {
            echo 'selected="select"';
        }

        ?>>3: Testing</option>

        <option value="4" <?php
        if ($CV->Status == 4) {
            echo 'selected="select"';
        }

        ?>>4: Đã qua test</option>

        <option value="5" <?php
        if ($CV->Status == 5) {
            echo 'selected="select"';
        }

        ?>>5: Không qua test</option>

        <option value="6" <?php
        if ($CV->Status == 6) {
            echo 'selected="select"';
        }

        ?>>6: Đã phỏng vấn</option>

        <option value="7" <?php
        if ($CV->Status == 7) {
            echo 'selected="select"';
        }

        ?>>7: Đồng ý làm bài test</option>

        <option value="8" <?php
        if ($CV->Status == 8) {
            echo 'selected="select"';
        }

        ?>>8: Đã làm bài test</option>

        <option value="9" <?php
        if ($CV->Status == 9) {
            echo 'selected="select"';
        }

        ?>>9: Từ chối làm bài test</option>

        <option value="10" <?php
        if ($CV->Status == 10) {
            echo 'selected="select"';
        }

        ?>>10: Đã nhận bài test gửi về</option>

        <option value="11" <?php
        if ($CV->Status == 11) {
            echo 'selected="select"';
        }

        ?>>11: Nhận</option>

        <option value="12" <?php
        if ($CV->Status == 12) {
            echo 'selected="select"';
        }

        ?>>12: Đã gửi mail offer</option>

        <option value="13" <?php
        if ($CV->Status == 13) {
            echo 'selected="select"';
        }

        ?>>13: Đã checkin</option>

        <option value="14" <?php
        if ($CV->Status == 14) {
            echo 'selected="select"';
        }

        ?>>14: Đã checkout</option>

        <option value="15" <?php
        if ($CV->Status == 15) {
            echo 'selected="select"';
        }

        ?>>15: Đã từ chối offer</option>

        <option value="16" <?php
        if ($CV->Status == 16) {
            echo 'selected="select"';
        }

        ?>>16: Đã xin nhận offer</option>

        <option value="17" <?php
        if ($CV->Status == 17) {
            echo 'selected="select"';
        }

        ?>>17: Lưu hồ sơ</option>

        <option value="18" <?php
        if ($CV->Status == 18) {
            echo 'selected="select"';
        }

        ?>>18: Từ chối phỏng vấn</option>

        <option value="19" <?php
        if ($CV->Status == 19) {
            echo 'selected="select"';
        }

        ?>>19: Đã đặt lịch làm bài test</option>
    </select>
</form>