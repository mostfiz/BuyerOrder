<form action="save" method="POST">
   <div class="form-group row">
    <label for="amount" class="col-sm-2 col-form-label">Amount</label>
    <div class="col-sm-8" id="amount-group">
      <input type="text"  class="form-control" id="amount" value="" onkeypress='validateOnlyNumbers(event)' maxlength="10" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="buyer" class="col-sm-2 col-form-label">Buyer</label>
    <div class="col-sm-8" id="buyer-group">
      <input type="text"  class="form-control" id="buyer" value="" maxlength="20" onkeypress='validateNumberSpaceText(event)'>
    </div>
  </div>
  <div class="form-group row">
    <label for="receipt_id" class="col-sm-2 col-form-label">Receipt Number</label>
    <div class="col-sm-8" id="receipt_id-group">
      <input type="text"  class="form-control" id="receipt_id" value="" onkeypress='validateOnlyText(event)' required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="items" class="col-sm-2 col-form-label">Items</label>
    <div class="col-sm-8" id="items-group">
      <select multiple class="form-control" id="items">
        <option>Item1</option>
        <option>Item2</option>
        <option>Item3</option>
        <option>Item4</option>
        <option>Item5</option>
        <option>Item6</option>
        <option>Item7</option>
        <option>Item8</option>
      </select>
      <small id="itemsHelp" class="form-text text-muted">Hold down the Ctrl (windows) or Command (Mac) button to select multiple options.</small>
    </div>
  </div>
  <div class="form-group row">
    <label for="buyer_email" class="col-sm-2 col-form-label">Buyer Email</label>
    <div class="col-sm-8" id="buyer-group">
      <input type="text"  class="form-control" id="buyer_email" value=""  onclick="validate()" required="required">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
  </div>
  <div class="form-group row">
    <label for="note" class="col-sm-2 col-form-label">Note</label>
    <div class="col-sm-8" id="note-group">
      <input type="text"  class="form-control" id="note" value="" maxlength="30" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="city" class="col-sm-2 col-form-label">City</label>
    <div class="col-sm-8" id="city-group">
      <input type="text"  class="form-control" id="city" value="" onkeypress='validateSpaceText(event)' required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-8" id="phone-group">
      <input type="text"  class="form-control" id="phone" value="" pattern="^\d{10}$" onkeypress='validateOnlyNumbers(event)' maxlength="10" required="required">
      <small id="phoneHelp" class="form-text text-muted">Phone number should be 10 digit without 0.</small>
    </div>
  </div>
  <div class="form-group row">
    <label for="entry_by" class="col-sm-2 col-form-label">Entry By</label>
    <div class="col-sm-8" id="entry_by-group">
      <input type="text"  class="form-control" id="entry_by" value="" onkeypress='validateOnlyNumbers(event)' maxlength="10" required="required">
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary" onclick="validate()">Save</button>
</form>

  <script src="/js/validation.js"></script>
  <script src="/js/formAjax.js"></script>
