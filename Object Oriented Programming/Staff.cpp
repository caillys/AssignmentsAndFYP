#include <iostream>
#include <string>
#include <vector>
#include <cstdlib>
#include "LeaveRecord.h"
#include "Staff.h"

using namespace std;


string Staff::getName() {
    return name;
}

void Staff::setId(int id) {
    this->id = id;
}
int Staff::getId() {
    return id;
}

string Staff::getSpos() {
    return spos;
}

string Staff::getCategory() {
    return category;
}

string Staff::getTelno() {
    return telno;
}

string Staff::getDept() {
    return dept;
}

int Staff::getBal() {
    return bal;
}

LeaveRecord* Staff::getLeave(int pos){
    return leaveList.getEntry(pos);
}

int Staff::getLengthLeave(){
     return leaveList.getLength();
}

void Staff::addLeave(int pos, LeaveRecord* leave) {
    leaveList.insert(pos, leave);
}

void Staff::addLeaveFront(LeaveRecord* leave) {
    leaveList.insertFront(leave);
}

void Staff::displayALeave(int pos){
    getLeave(pos)->display();
}

void Staff::displayLeaveAll(){
    for(int i=1; i<=leaveList.getLength(); i++){
        getLeave(i)->display();
    }
}
