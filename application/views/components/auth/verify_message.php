<?php if ($auth['is_verified'] == 1): ?>
    <div class="alert alert-default-success mt-3">
        Your account is verified.
    </div>
<?php else: ?>
    <div class="alert alert-default-primary mt-3">
        Your account is not verified. Please check your inbox.<br><br>
        <p class="text-muted">If you haven't received an email, click the button to resend the verification</p>
        <button type="button" class="btn btn-outline-info" id="resend_verify">
            Resend confirmation
        </button>
    </div>
<?php endif; ?>
