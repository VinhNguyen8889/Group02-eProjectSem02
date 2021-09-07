import React, { Component, Fragment } from 'react'
import { Col, Container, Row } from 'react-bootstrap'
import RestClient from '../../RestAPI/RestClient.js'
import AppUrl from '../../RestAPI/AppUrl.js'
import ReactHtmlParser from 'react-html-parser';

 class TremsDescription extends Component {

     constructor(){
          super();
          this.state = {
               terms:"...",
          }}
      
      componentDidMount(){
          RestClient.GetRequest(AppUrl.Information).then(result=>{
               this.setState({terms:result[0]['terms']});           
          });
      }


     render() {
          return (
              <Fragment>
                   <Container>
                        <Row>
                        <Col lg={12} md={12} sm={12}>

                        {ReactHtmlParser(this.state.terms)}
               </Col>
                        </Row>
                   </Container>
              </Fragment>
          )
     }
}

export default TremsDescription
