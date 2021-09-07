import React, { Component, Fragment } from 'react'
import { Col, Container, Row } from 'react-bootstrap'
import RestClient from '../../RestAPI/RestClient.js'
import AppUrl from '../../RestAPI/AppUrl.js'
import ReactHtmlParser from 'react-html-parser';


class RefundDescription extends Component {

     constructor(){
          super();
          this.state = {
               refund:"...",
          }}
      
      componentDidMount(){
          RestClient.GetRequest(AppUrl.Information).then(result=>{
               this.setState({refund:result[0]['refund']});           
          });
      }


     render() {
          return (
<Fragment>
     <Container className="mt-5">
          <Row>
               <Col lg={12} md={12} sm={12}>
                    {ReactHtmlParser(this.state.refund)}
               </Col>
          </Row>
     </Container>
</Fragment>

          )
     }
}

export default RefundDescription
