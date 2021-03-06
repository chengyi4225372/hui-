import  React from 'react';
import {Tabs, Radio, Button} from 'antd';
import axios from 'axios'
import UserInfoTabsOrder from "./UserInfoTabs_myOrder";
import MyOrderDetail01 from "./MyOrderDetail01"
import UserSeting from "../userSelfinfo/UserSeting";
import UserSetingPwd from "../userSelfinfo/UserSetingPwd";
import InvoiceList from './InvoiceList'
import ReChargeList from './ReChargeList'
import {user_id_check ,token_check } from '../userInfo/LocalStorage'
const TabPane = Tabs.TabPane;
class UserInfoTabs extends React.Component{
    constructor(props) {
        super(props);
        this.state = {
            mode: 'left',
            current:0,
            tab01Flat:true,
            goodsDetail:{},
            tab01Data:{},
            order_id_ok:false,
           
        };
        Object.assign(this.state,this.props)
        this.tab01Flat = this.tab01Flat.bind(this)
        this.loginOut = this.loginOut.bind(this)
    }
    TabClick(e){
     //console.log(e);
     this.setState({
        tab01Flat:true,
    })
     if(e==4){
   
        this.loginOut();
     }

       
    }
    loginOut(event){
        const userid = localStorage.getItem("hyquser_id")
        const usertoken = localStorage.getItem("hyqutoken")
        const _that= this
        if(userid && usertoken){
            axios.post("/index/api/loginout",{
                id:userid,
                token:usertoken
            }).then(function (response) {
                console.log(response)
                if(response.data.res == 0){
                    alert(response.data.err)
                }else {
                    console.log("退出登录清除ID和token")
                    localStorage.removeItem("hyquser_id")
                    localStorage.removeItem("hyqutoken")
                    _that.setState({userid:'',usertoken:''})
                    window.location.href="/"
                }
            }).catch(function (err) {
                alert(err)
            })
        }
    }
    tab01Flat (a,b, c){
        console.log(a);
        if(a.order_id_ok){
            this.setState({
                order_id_ok:true
            })
        }
        const ID = a.id;
        const _that = this;
        axios.post("/user/goods/info",{
            id:ID,
            user_id_check:user_id_check,
            token_check:token_check

        }).then(function (response) {

            if(response.data.res === 1){
                _that.setState({
                    tab01Data: response.data.data,
                    tab01Flat:false
                })
            }else{
                alert(response.data.err)
            }
        }).catch(function (err) {
            alert(err)
        })
    }
    handleModeChange = (e) => {
        const mode = e.target.value;
        this.setState({ mode });
    }

    render() {
        const { mode } = this.state;

        return (
            <div>
            <Tabs
        tabPosition={mode}
        onTabClick={this.TabClick.bind(this)}
        style={{ position:"static" }}
    >
          <TabPane tab="我的订单" key="1">
              {this.state.tab01Flat?<UserInfoTabsOrder tab01Flat={this.tab01Flat}/>:<MyOrderDetail01  _data={this.state.tab01Data} orderIdOk = {this.state.order_id_ok}/>}
          </TabPane>
          <TabPane tab="个人设置" key="2"><UserSeting userInfor={this.props.userInfor}/>
          </TabPane>
          <TabPane tab="退出登陆" key="4" onClick={this.loginOut}>Content of tab 4</TabPane>
          <TabPane tab="修改密码" key="3"><UserSetingPwd /></TabPane>
          <TabPane tab="充值记录" key="5"><ReChargeList  userInfor={this.props.userInfor} /></TabPane>
          <TabPane tab="开票记录" key="6"><InvoiceList  userInfor={this.props.userInfor}/></TabPane>
          </Tabs>
        </div>
    );
    }
}

export default UserInfoTabs;
