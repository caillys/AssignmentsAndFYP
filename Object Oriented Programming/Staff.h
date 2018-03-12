#ifndef STAFF
#define STAFF

#include "LeaveRecord.h"
#include "LinkedList.h"

class Staff
{
    string name, spos, category, telno, dept;
    int id;
    int bal;
    LinkedList<LeaveRecord*> leaveList;

  public:
    Staff (string name = " ", int id = 0, string spos = " ", string category = " ",
           string telno = " ", string dept = " ", int bal = 0) :
           name(name), id(id), spos(spos), category(category),
           telno(telno), dept(dept),  bal(bal) {}

    string getName() {  return name; }
    void setId(int id) { this->id = id; }
    int getId(){ return id; }
    string getSpos(){ return spos; }
    string getCategory(){ return category; }
    string getTelno(){ return telno; }
    string getDept(){ return dept; }
    int getBal(){ return bal; }

    LeaveRecord* getLeave(int pos) { return leaveList.getEntry(pos); }
    int getLengthLeave(){ return leaveList.getLength(); }
    void addLeave(int pos, LeaveRecord* lv){ leaveList.insert(pos, lv); }
    void addLeaveFront(LeaveRecord* lv){ leaveList.insertFront(lv); }
    void displayALeave(int pos){ getLeave(pos)->display(); }
    void displayLeaveAll(){
        for(int i=1; i<=leaveList.getLength(); i++){
            getLeave(i)->display();
        }
    }
};

#endif
