
export default {

  clearAlerts(state){
    state.alerts = [];
  },
  errorPush(state  ,  text ){
    let error = {
      text: text,
      alertStyle:'text-danger',
      id:getUid(),
    }
    state.alerts.push(error);
  },
  successPush(state  ,  text ){
    let success = {
      text: text,
      alertStyle:'text-success',
      id:getUid(),
    }
    state.alerts.push(success);
  },
  errorRemove(state, id){
    let tmp = [];
    state.alerts.forEach(function (value , key) {
      if(value.id !== id){
        tmp.push(value);
      }
    })
    state.alerts = tmp;
  },

}
const getUid = function(){
  return Date.now().toString(36) + Math.random().toString(36).substr(2);
}