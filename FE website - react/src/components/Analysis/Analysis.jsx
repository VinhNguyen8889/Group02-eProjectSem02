import React, { Component, Fragment } from 'react'
import { Col, Container, Row } from 'react-bootstrap'
import { Bar, BarChart, ResponsiveContainer, Tooltip, XAxis } from 'recharts';
import RestClient from '../../RestAPI/RestClient.js'
import AppUrl from '../../RestAPI/AppUrl.js'
import ReactHtmlParser from 'react-html-parser';

class Analysis extends Component {


          constructor(){
               super();
               this.state = {
                    myData:[],
                    techDes:"....",
               }}
           
           componentDidMount(){
               RestClient.GetRequest(AppUrl.ChartData).then(result=>{
                    this.setState({myData:result});           
               });
               RestClient.GetRequest(AppUrl.HomeTechDes).then(result=>{
                    this.setState({techDes:result[0]['tech_description']});           
               });
           }
     

     render() {

          var blue = "#051b35"
          return (
                <Fragment>
     <Container className="text-center">
     <h1 className="serviceMainTitle">TECHNOLOGY USED</h1>
               <div className="bottom"></div>
          <Row>
           <Col style={{width:'100%', height:'300px'}} lg={6} md={12} sm={12}>
                 <ResponsiveContainer>   
               <BarChart width={100} height={300} data={this.state.myData}>
               
               <XAxis dataKey="Technology" /> 
               <Tooltip />
               <Bar dataKey="Projects" fill={blue}>

               </Bar>
               </BarChart>
               </ResponsiveContainer>
               
            </Col>




               
               <Col lg={6} md={12} sm={12}>
     <p className="text-justify serviceDescription">{ReactHtmlParser(this.state.techDes)}</p>
               </Col>
          </Row>
     </Container>


                </Fragment>
          )
     }
}

export default Analysis
