#ifndef LEAVERECORD
#define LEAVERECORD

#include <iostream>
#include <string>

using namespace std;

class LeaveRecord{
    private:
        string startDate, endDate, type, reason, approver, status;
    public:
        LeaveRecord(string startDate = " ", string endDate = " ", string type = " ", string reason = " ", string approver = " ", string status = " "):
                startDate(startDate), endDate(endDate), type(type), reason(reason), approver(approver), status(status) {}
        string getStartDate();
        string getEndDate();
        string getType();
        string getReason();
        string getApprover();
        string getStatus();

        void display();
};

#endif

