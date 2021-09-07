import React, { Component, Fragment } from 'react'
import { Col, Container, Row } from 'react-bootstrap'
import RestClient from '../../RestAPI/RestClient.js'
import AppUrl from '../../RestAPI/AppUrl.js'
import ReactHtmlParser from 'react-html-parser';

class AboutDescription extends Component {

     constructor(){
          super();
          this.state = {
               aboutDesc:"...",
          }}
      
      componentDidMount(){
          RestClient.GetRequest(AppUrl.Information).then(result=>{
               this.setState({aboutDesc:result[0]['about']});           
          });
      }

     render() {
          return (
               <Fragment>
                    <Container className="mt-5">
                         <Row>
                              <Col sm={12} lg={12} md={12}>

                              {ReactHtmlParser(this.state.aboutDesc)}

                              </Col>
                         </Row>
                    </Container>
               </Fragment>
          )
     }
}

export default AboutDescription
